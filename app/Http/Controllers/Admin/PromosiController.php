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
use BenSampo\Embed\Rules\EmbeddableUrl;
use Illuminate\Support\Str;
use BenSampo\Embed\Services\Vimeo;
use BenSampo\Embed\Services\YouTube;

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
            ->orderBy('containers.id', 'DESC')
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
            ->orderBy('containers.id', 'DESC')
            ->paginate(5);

        $section_v = DB::table('containers')
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
                'contents.link_url',
                'contents.id_container as id_container',
                'contents.id_content_status as id_content_status',
                'content__statuses.id as id_status',
                'content__statuses.status_name'
            )
            ->where('containers.container_name', 'section_video')
            ->orderBy('containers.id', 'DESC')
            ->get();

        return view('admin.section_promosi.show_pengenalan', [
            'section_p' => $section_p,
            'section_t' => $section_t,
            'section_v' => $section_v,
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

                $ctr = DB::table('contents')->insertGetId([
                    'content_name' => $request->content_name,
                    'id_container' => $ctrs,
                    'id_content_status' => $is_active,
                    'id_user' => $ids,
                    'update_by' => $ids,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'image' => $name,
                    'link_url' => $request->link_url,
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
                'contents.link_url',
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
                        'link_url' => $request->link_url,
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
                    'link_url' => $request->link_url,
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

    /**
     * VIDEO
     */
    public function store_video(Request $request)
    {
        // $url = $request->link_url;
        // $string = Str::of($url)->remove('https://www.youtube.com/watch?v=');
        // $url_link = 'https://www.youtube.com/embed/' . $string;
        $ids = auth()->user()->id;

        if (empty($request->link_url) && empty($request->video)) {
            Toastr::error('Text Kosong', 'Error');
            return redirect()->back();
        }
        $link = '';
        if (!empty($request->link_url)) {
            $link = $request->link_url;
            $ctrs = DB::table('containers')->insertGetId([
                'container_name' => 'section_video',
                'id_user' => $ids,
                'update_by' => $ids,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $ctr = DB::table('contents')->insertGetId([
                'id_container' => $ctrs,
                'id_content_status' => 1,
                'id_user' => $ids,
                'update_by' => $ids,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'image' => '',
                'link_url' => $link,
            ]);
            Toastr::success('Berhasil Simpan :)', 'Success');
            return redirect()->back();
        }
        if (!empty($request->video)) {
            // $this->validate(
            //     $request,
            //     [
            //         'video' => [
            //             '
            //         mimetypes:video,video/avi,video/mpeg,video/quicktime,
            //         video/x-flv,video/mp4,application/x-mpegURL,
            //         video/MP2T,video/3gpp,video/x-msvideo,video/x-ms-wmv
            //         |max:102400',
            //         ],
            //     ],
            //     [
            //         'video.mimetypes' => 'format video salah',
            //     ]
            // );
            $allowedfileExtension = [
                'video',
                'avi',
                'mpeg',
                'quicktime',
                'x-flv',
                'mp4',
                'application/x-mpegURL',
                'MP2T',
                '3gpp',
                'x-msvideo',
                'x-ms-wmv',
            ];
            $link = $request->file('video');
            $names = $link->getClientOriginalName();
            $extension = $link->getClientOriginalExtension();
            $name = $link->hashName();
            $link->move(\base_path() . '/public/video/testimoni/', $name);
            $newPath = URL::asset('/video/testimoni') . '/';
            $check = in_array($extension, $allowedfileExtension);

            if ($check) {
                $ctrs = DB::table('containers')->insertGetId([
                    'container_name' => 'section_video',
                    'id_user' => $ids,
                    'update_by' => $ids,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                $ctr = DB::table('contents')->insertGetId([
                    'id_container' => $ctrs,
                    'id_content_status' => 1,
                    'id_user' => $ids,
                    'update_by' => $ids,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'image' => $name,
                    'link_url' => '',
                ]);
                Toastr::success('Berhasil Simpan :)', 'Success');
                return redirect()->back();
            } else {
                Toastr::error('Format video Salah', 'Error');
                return redirect()->back();
            }
        }
    }

    public function update_video(Request $request, $id)
    {
        $ids = auth()->user()->id;

        if (empty($request->link_url) && empty($request->video)) {
            Toastr::error('Text Kosong', 'Error');
            return redirect()->back();
        }
        $link = '';
        if (!empty($request->link_url)) {
            $del = Content::where('id_container', $id)->first();
            $file_path = public_path('video/testimoni') . '/' . $del->image;
            if (File::exists($file_path)) {
                File::delete($file_path);
                // $d->delete(); //for deleting record and file try both
            }
            $link = $request->link_url;
            $ctr = DB::table('contents')
                ->where('id_container', $id)
                ->update([
                    'id_content_status' => 1,
                    'id_user' => $ids,
                    'update_by' => $ids,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'image' => '',
                    'link_url' => $link,
                ]);
            Toastr::success('Berhasil Simpan :)', 'Success');
            return redirect()->back();
        }
        if (!empty($request->video)) {
            // $this->validate(
            //     $request,
            //     [
            //         'video' => [
            //             '
            //         mimetypes:video,video/avi,video/mpeg,video/quicktime,
            //         video/x-flv,video/mp4,application/x-mpegURL,
            //         video/MP2T,video/3gpp,video/x-msvideo,video/x-ms-wmv
            //         |max:102400',
            //         ],
            //     ],
            //     [
            //         'video.mimetypes' => 'format video salah',
            //     ]
            // );
            $allowedfileExtension = [
                'video',
                'avi',
                'mpeg',
                'quicktime',
                'x-flv',
                'mp4',
                'application/x-mpegURL',
                'MP2T',
                '3gpp',
                'x-msvideo',
                'x-ms-wmv',
            ];
            $link = $request->file('video');
            $names = $link->getClientOriginalName();
            $extension = $link->getClientOriginalExtension();
            $name = $link->hashName();
            $link->move(\base_path() . '/public/video/testimoni/', $name);
            $newPath = URL::asset('/video/testimoni') . '/';
            $check = in_array($extension, $allowedfileExtension);

            if ($check) {
                $del = Content::where('id_container', $id)->first();
                $file_path = public_path('video/testimoni') . '/' . $del->image;
                if (File::exists($file_path)) {
                    File::delete($file_path);
                    // $d->delete(); //for deleting record and file try both
                }
                $ctr = DB::table('contents')
                    ->where('id_container', $id)
                    ->update([
                        'id_content_status' => 1,
                        'id_user' => $ids,
                        'update_by' => $ids,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        'image' => $name,
                        'link_url' => '',
                    ]);
                Toastr::success('Berhasil Simpan :)', 'Success');
                return redirect()->back();
            } else {
                Toastr::error('Format video Salah', 'Error');
                return redirect()->back();
            }
        }
    }

    public function delete_video($id)
    {
        $del_v = DB::table('containers')
            ->join('contents', 'containers.id', '=', 'contents.id_container')
            ->join(
                'content__statuses',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )
            ->where('contents.id_container', $id)
            ->get();
        foreach ($del_v as $key => $imgs) {
            $file_path = public_path('video/testimoni') . '/' . $imgs->image;
            if (File::exists($file_path)) {
                File::delete($file_path);
            }
        }

        $del_v2 = DB::table('containers')
            ->where('id', $id)
            ->delete();
        Toastr::success('successfully Hapus :)', 'Success');
        return redirect()->route('admin.promosi_pengenalan');
    }
}
