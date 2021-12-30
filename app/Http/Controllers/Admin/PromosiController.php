<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use App\Models\User;
use App\Models\Role;
use App\Models\Company_Identity;
use App\Models\Content;
use App\Models\Content_Status;
use App\Models\Container;
use DB;
use Auth;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Image;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class PromosiController extends Controller
{
    /**
     * Promosi Pengenalan
     */
    public function promosi_pengenalan()
    {
        $base = DB::table('containers')
            ->join('contents', 'containers.id', '=', 'contents.id_container')
            ->join(
                'content__statuses',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )
            ->select(
                'containers.id',
                'containers.container_name',
                'containers.id_user',
                'containers.created_at',
                'containers.updated_at',
                'contents.id as id_content',
                'contents.content_name',
                'contents.image',
                'contents.id_container as id_container',
                'contents.id_content_status as id_content_status',
                'content__statuses.id as id_status',
                'content__statuses.status_name'
            );

        $section_p = $base
            ->where('containers.container_name', 'section_pengenalan')
            ->get();

        $section_t = DB::table('containers')
            ->join('contents', 'containers.id', '=', 'contents.id_container')
            ->join(
                'content__statuses',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )
            ->select(
                'containers.id',
                'containers.container_name',
                'containers.id_user',
                'containers.created_at',
                'containers.updated_at',
                'contents.id as id_content',
                'contents.content_name',
                'contents.image',
                'contents.id_container as id_container',
                'contents.id_content_status as id_content_status',
                'content__statuses.id as id_status',
                'content__statuses.status_name'
            )
            ->where('containers.container_name', 'section_testimoni')
            ->paginate(10);

        return view('admin.section_promosi.show_pengenalan', [
            'section_p' => $section_p,
            'section_t' => $section_t,
        ]);
    }
    public function create_promosi_pengenalan()
    {
        return view('admin.section_promosi.create_promosi_pengenalan');
    }

    public function store_promosi_pengenalan(Request $request)
    {
        $this->validate(
            $request,
            [
                'photo' => 'required',
                'content_name' => 'required',
            ],
            [
                'photo.required' => 'Wajib Isi',
                'content_name.required' => 'Wajib Isi',
            ]
        );

        if ($request->status) {
            $is_active = 1;
        } else {
            $is_active = 2;
        }

        $ids = auth()->user()->id;
        if (isset($request->photo)) {
            $allowedfileExtension = ['pdf', 'jpg', 'jpeg', 'png', 'docx'];
            $resources = $request->file('photo');
            $names = $resources->getClientOriginalName();
            $extension = $resources->getClientOriginalExtension();
            $name = $resources->hashName();
            $resources->move(\base_path() . '/public/image/promosi/', $name);
            $newPath = URL::asset('/image/promosi') . '/';
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $ctrs = DB::table('containers')->insertGetId([
                    'container_name' => 'section_pengenalan',
                    'id_user' => $ids,
                    'update_by' => $ids,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                // $cst = DB::table('content__statuses')->insertGetId([
                //     'status_name' => $is_active,
                //     'id_user' => $ids,
                //     'update_by' => $ids,
                //     'created_at' => Carbon::now(),
                //     'updated_at' => Carbon::now(),
                // ]);

                $ctr = DB::table('contents')->insertGetId([
                    'content_name' => $request->content_name,
                    'id_container' => $ctrs,
                    'id_content_status' => $is_active,
                    'id_user' => $ids,
                    'update_by' => $ids,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'image' => $name,
                ]);

                Toastr::success('successfully save :)', 'Success');
                return redirect()->back();
            }
        } else {
            Toastr::erorr('terjadi kesalahan :)', 'Error');
            return redirect()->back();
        }
    }

    public function edit_promosi_pengenalan($id)
    {
        $base = DB::table('containers')
            ->join('contents', 'containers.id', '=', 'contents.id_container')
            ->join(
                'content__statuses',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )
            ->select(
                'containers.id',
                'containers.container_name',
                'containers.id_user',
                'containers.created_at',
                'containers.updated_at',
                'contents.id as id_content',
                'contents.content_name',
                'contents.image',
                'contents.id_container as id_container',
                'contents.id_content_status as id_content_status',
                'content__statuses.id as id_status',
                'content__statuses.status_name'
            );

        $edit_spp = $base
            ->where([
                ['containers.id', $id],
                ['containers.container_name', 'section_pengenalan'],
            ])
            ->first();

        return view('admin.section_promosi.edit_section_pengenalan', [
            'edit_spp' => $edit_spp,
        ]);
    }

    public function update_promosi_pengenalan(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'content_name' => 'required',
            ],
            [
                'content_name.required' => 'Wajib Isi',
            ]
        );

        $ids = auth()->user()->id;
        if ($request->status) {
            $is_active = 1;
        } else {
            $is_active = 2;
        }
        if (isset($request->photo)) {
            $allowedfileExtension = ['pdf', 'jpg', 'jpeg', 'png', 'docx'];
            $resources = $request->file('photo');
            $names = $resources->getClientOriginalName();
            $extension = $resources->getClientOriginalExtension();
            $name = $resources->hashName();
            $resources->move(\base_path() . '/public/image/promosi/', $name);
            $newPath = URL::asset('/image/promosi') . '/';
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $containers = DB::table('containers')
                    ->where('id', $id)
                    ->update([
                        'id_user' => $ids,
                        'update_by' => $ids,
                        'updated_at' => Carbon::now(),
                    ]);

                $unl = DB::table('contents')
                    ->where('id_container', $id)
                    ->get();
                foreach ($unl as $key => $imgs) {
                    $file_path =
                        public_path('image/promosi') . '/' . $imgs->image;
                    if (File::exists($file_path)) {
                        File::delete($file_path);
                    }
                }

                $contain = DB::table('contents')
                    ->where('id_container', $id)
                    ->update([
                        'content_name' => $request->content_name,
                        'id_container' => $id,
                        'id_content_status' => $is_active,
                        'id_user' => $ids,
                        'update_by' => $ids,
                        'updated_at' => Carbon::now(),
                        'image' => $name,
                    ]);

                Toastr::success('Ubah Berhasil :)', 'Success');
                return redirect()->route('admin.promosi_pengenalan');
            }
        } else {
            $containers = DB::table('containers')
                ->where('id', $id)
                ->update([
                    'id_user' => $ids,
                    'update_by' => $ids,
                    'updated_at' => Carbon::now(),
                ]);

            $contan = DB::table('contents')
                ->where('id_container', $id)
                ->update([
                    'content_name' => $request->content_name,
                    'id_container' => $id,
                    'id_content_status' => $is_active,
                    'id_user' => $ids,
                    'update_by' => $ids,
                    'updated_at' => Carbon::now(),
                ]);
            Toastr::success('successfully update :)', 'Success');
            return redirect()->route('admin.promosi_pengenalan');
        }
    }
    public function delete_promosi_pengenalan($id)
    {
        $del_spp = DB::table('containers')
            ->join('contents', 'containers.id', '=', 'contents.id_container')
            ->join(
                'content__statuses',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )
            ->where('contents.id_container', $id)
            ->get();
        foreach ($del_spp as $key => $imgs) {
            $file_path = public_path('image/promosi') . '/' . $imgs->image;
            if (File::exists($file_path)) {
                File::delete($file_path);
            }
        }

        $del_spp3 = DB::table('containers')
            ->where('id', $id)
            ->delete();
        Toastr::success('successfully Hapus :)', 'Success');
        return redirect()->back();
    }
    /**
     * Promosi
     */
    public function promosi()
    {
    }

    /**
     * Testimoni
     */
    public function create_testimoni()
    {
        return view('admin.testimoni.create');
    }
    public function store_testimoni(Request $request)
    {
        $this->validate(
            $request,
            [
                'photo' => 'required',
            ],
            [
                'photo.required' => 'Wajib Isi',
            ]
        );

        if ($request->status) {
            $is_active = 1;
        } else {
            $is_active = 2;
        }
        $ids = auth()->user()->id;
        if (isset($request->photo)) {
            $allowedfileExtension = ['pdf', 'jpg', 'jpeg', 'png', 'docx'];
            $resources = $request->file('photo');
            $names = $resources->getClientOriginalName();
            $extension = $resources->getClientOriginalExtension();
            $name = $resources->hashName();
            $resources->move(\base_path() . '/public/image/testimoni/', $name);
            $newPath = URL::asset('/image/testimoni') . '/';
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $ctrs = DB::table('containers')->insertGetId([
                    'container_name' => 'section_testimoni',
                    'id_user' => $ids,
                    'update_by' => $ids,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                $ctr = DB::table('contents')->insertGetId([
                    'id_container' => $ctrs,
                    'id_content_status' => $is_active,
                    'id_user' => $ids,
                    'update_by' => $ids,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'image' => $name,
                ]);

                Toastr::success('Berhasil Simpan :)', 'Success');
                return redirect()->back();
            }
        } else {
            Toastr::erorr('terjadi kesalahan :)', 'Error');
            return redirect()->back();
        }
    }
    public function edit_testimoni($id)
    {
        $edit_t = DB::table('containers')
            ->join('contents', 'containers.id', '=', 'contents.id_container')
            ->join(
                'content__statuses',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )
            ->select(
                'containers.id',
                'containers.container_name',
                'containers.id_user',
                'containers.created_at',
                'containers.updated_at',
                'contents.id as id_content',
                'contents.content_name',
                'contents.image',
                'contents.id_container as id_container',
                'contents.id_content_status as id_content_status',
                'content__statuses.id as id_status',
                'content__statuses.status_name'
            )
            ->where([
                ['containers.id', $id],
                ['containers.container_name', 'section_testimoni'],
            ])
            ->first();

        return view('admin.testimoni.edit', ['edit_t' => $edit_t]);
    }
    public function update_testimoni(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'photo' => 'required',
            ],
            [
                'photo.required' => 'Wajib Isi',
            ]
        );

        $ids = auth()->user()->id;
        if ($request->status) {
            $is_active = 1;
        } else {
            $is_active = 2;
        }
        if (isset($request->photo)) {
            $allowedfileExtension = ['pdf', 'jpg', 'jpeg', 'png', 'docx'];
            $resources = $request->file('photo');
            $names = $resources->getClientOriginalName();
            $extension = $resources->getClientOriginalExtension();
            $name = $resources->hashName();
            $resources->move(\base_path() . '/public/image/testimoni/', $name);
            $newPath = URL::asset('/image/testimoni') . '/';
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $containers = DB::table('containers')
                    ->where('id', $id)
                    ->update([
                        'id_user' => $ids,
                        'update_by' => $ids,
                        'updated_at' => Carbon::now(),
                    ]);

                $unl = DB::table('contents')
                    ->where('id_container', $id)
                    ->get();
                foreach ($unl as $key => $imgs) {
                    $file_path =
                        public_path('image/testimoni') . '/' . $imgs->image;
                    if (File::exists($file_path)) {
                        File::delete($file_path);
                    }
                }

                $contain = DB::table('contents')
                    ->where('id_container', $id)
                    ->update([
                        'id_container' => $id,
                        'id_content_status' => $is_active,
                        'id_user' => $ids,
                        'update_by' => $ids,
                        'updated_at' => Carbon::now(),
                        'image' => $name,
                    ]);

                Toastr::success('Ubah Berhasil :)', 'Success');
                return redirect()->route('admin.promosi_pengenalan');
            }
        } else {
            $containers = DB::table('containers')
                ->where('id', $id)
                ->update([
                    'id_user' => $ids,
                    'update_by' => $ids,
                    'updated_at' => Carbon::now(),
                ]);

            $contan = DB::table('contents')
                ->where('id_container', $id)
                ->update([
                    'id_container' => $id,
                    'id_content_status' => $is_active,
                    'id_user' => $ids,
                    'update_by' => $ids,
                    'updated_at' => Carbon::now(),
                ]);
            Toastr::success('successfully update :)', 'Success');
            return redirect()->route('admin.promosi_pengenalan');
        }
    }
    public function delete_testimoni($id)
    {
        $del_spp = DB::table('containers')
            ->join('contents', 'containers.id', '=', 'contents.id_container')
            ->join(
                'content__statuses',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )
            ->where('contents.id_container', $id)
            ->get();
        foreach ($del_spp as $key => $imgs) {
            $file_path = public_path('image/testimoni') . '/' . $imgs->image;
            if (File::exists($file_path)) {
                File::delete($file_path);
            }
        }

        $del_spp3 = DB::table('containers')
            ->where('id', $id)
            ->delete();
        Toastr::success('successfully Hapus :)', 'Success');
        return redirect()->back();
    }
}
