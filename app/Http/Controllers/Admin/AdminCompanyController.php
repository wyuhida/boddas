<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Company_Identity;
use App\Models\Content;
use App\Models\Content_Status;
use App\Models\Container;
use App\Models\Kontak_us;
use DB;
use Auth;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Image;
use RealRashid\SweetAlert\Facades\Alert;
use File;
class AdminCompanyController extends Controller
{
    /**
     * FOUNDER
     */
    public function admin_tentangkami()
    {
        $item = DB::table('containers')
            ->join('contents', 'containers.id', '=', 'contents.id_container')
            ->join(
                'content__statuses',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )
            ->where('containers.container_name', 'founder')
            ->get();
        $histori = DB::table('containers')
            ->join('contents', 'containers.id', '=', 'contents.id_container')
            ->join(
                'content__statuses',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )
            ->where('containers.container_name', 'histori')
            ->get();

        $visimisi = DB::table('containers')
            ->join('contents', 'containers.id', '=', 'contents.id_container')
            ->join(
                'content__statuses',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )
            ->where('containers.container_name', 'visidanmisi')
            ->orderBy('containers.id', 'DESC')
            ->first();

        return view('admin.tentang_kami.founder.show', [
            'item' => $item,
            'histori' => $histori,
            'visimisi' => $visimisi,
        ]);
    }

    public function add_admin_tentangkami()
    {
        return view('admin.tentang_kami.founder.create');
    }

    public function store_admin_tentangkami(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required',
        ]);

        $ids = auth()->user()->id;
        if (isset($request->photo)) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'jpeg', 'docx'];
            $resources = $request->file('photo');
            $names = $resources->getClientOriginalName();
            $extension = $resources->getClientOriginalExtension();
            $name = $resources->hashName();
            $resources->move(\base_path() . '/public/image/company/', $name);
            $newPath = URL::asset('/image/company') . '/';
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $containers = DB::table('containers')->insertGetId([
                    'container_name' => 'founder',
                    'id_user' => $ids,
                    'update_by' => $ids,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                $containers = DB::table('contents')->insertGetId([
                    'content_name' => $request->content_name,
                    'id_container' => $containers,
                    'id_content_status' => 1,
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
    public function admin_edit_tentangkami($id)
    {
        $edit_tentangkami = DB::table('containers')
            ->join('contents', 'containers.id', '=', 'contents.id_container')
            ->join(
                'content__statuses',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )
            ->where('containers.container_name', 'founder')
            ->first();

        return view('admin.tentang_kami.founder.edit', [
            'edit_tentangkami' => $edit_tentangkami,
        ]);
    }

    public function update_admin_tentangkami(Request $request, $id)
    {
        $ids = auth()->user()->id;

        if (isset($request->photo)) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $resources = $request->file('photo');
            $names = $resources->getClientOriginalName();
            $extension = $resources->getClientOriginalExtension();
            $name = $resources->hashName();
            $resources->move(\base_path() . '/public/image/company/', $name);
            $newPath = URL::asset('/image/company') . '/';
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $containers = DB::table('containers')
                    ->where('id', $id)
                    ->update([
                        'container_name' => 'founder',
                        'id_user' => $ids,
                        'update_by' => $ids,
                        'updated_at' => Carbon::now(),
                    ]);

                $unl = DB::table('contents')
                    ->where('id_container', $id)
                    ->get();
                foreach ($unl as $key => $imgs) {
                    $file_path =
                        public_path('image/company') . '/' . $imgs->image;
                    if (File::exists($file_path)) {
                        File::delete($file_path); //for deleting only file try this
                        // $d->delete(); //for deleting record and file try both
                    }
                }

                $contain = DB::table('contents')
                    ->where('id_container', $id)
                    ->update([
                        'content_name' => $request->content_name,
                        'id_container' => $id,
                        'id_user' => $ids,
                        'update_by' => $ids,
                        'updated_at' => Carbon::now(),
                        'image' => $name,
                    ]);

                Toastr::success('successfully update :)', 'Success');
                return redirect()->route('admin.admin_tentangkami');
            }
        } else {
            $containers = DB::table('containers')
                ->where('id', $id)
                ->update([
                    'container_name' => 'founder',
                    'id_user' => $ids,
                    'update_by' => $ids,
                    'updated_at' => Carbon::now(),
                ]);

            $contan = DB::table('contents')
                ->where('id_container', $id)
                ->update([
                    'content_name' => $request->content_name,
                    'id_container' => $id,
                    'id_user' => $ids,
                    'update_by' => $ids,
                    'updated_at' => Carbon::now(),
                ]);

            // $st = DB::table('content__statuses')
            //     ->where('status_name', 1)
            //     ->update([
            //         'status_name' => 1,
            //         'id_user' => $ids,
            //         'update_by' => $ids,
            //         'updated_at' => Carbon::now(),
            //     ]);

            Toastr::success('successfully update :)', 'Success');
            return redirect()->route('admin.admin_tentangkami');
        }
    }

    public function delete_admin_tentangkami($id)
    {
        $del_founder1 = DB::table('containers')
            ->join('contents', 'containers.id', '=', 'contents.id_container')
            ->join(
                'content__statuses',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )
            ->where('contents.id_container', $id)
            ->get();
        foreach ($del_founder1 as $key => $imgs) {
            $file_path = public_path('image/company') . '/' . $imgs->image;
            if (File::exists($file_path)) {
                File::delete($file_path); //for deleting only file try this
                // $d->delete(); //for deleting record and file try both
            }
        }

        $del_founder = DB::table('content__statuses')
            ->join(
                'contents',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )

            ->where([['contents.id_container', $id]]);
        $del = $del_founder->delete();

        $del_founder2 = DB::table('containers')
            // ->join('contents', 'containers.id', '=', 'contents.id_container')
            // ->join(
            //     'content__statuses',
            //     'content__statuses.id',
            //     '=',
            //     'contents.id_content_status'
            // )
            // ->where([['contents.id_container', $id], ['containers.id', $id]]);
            ->where('id', $id)
            ->delete();
        Toastr::success('successfully Hapus :)', 'Success');
        return redirect()->back();
    }

    /**
     * ADMIN HISTORI
     */
    // public function admin_histori_tentangkami()
    // {
    // }
    public function create_histori_admin_tentangkami()
    {
        return view('admin.tentang_kami.histori.create');
    }
    public function store_histori_admin_tentangkami(Request $request)
    {
        $this->validate($request, [
            'content_name' => 'required',
        ]);
        $ids = auth()->user()->id;
        $containers = DB::table('containers')->insertGetId([
            'container_name' => 'histori',
            'id_user' => $ids,
            'update_by' => $ids,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $ct = DB::table('contents')->insertGetId([
            'content_name' => $request->content_name,
            'id_container' => $containers,
            'id_content_status' => 1,
            'id_user' => $ids,
            'update_by' => $ids,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Toastr::success('successfully save :)', 'Success');
        return redirect()->route('admin.admin_tentangkami');
    }
    public function edit_histori_tentangkami($id)
    {
        $edit_histori = DB::table('containers')
            ->join('contents', 'containers.id', '=', 'contents.id_container')
            ->join(
                'content__statuses',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )
            ->where([
                ['containers.container_name', 'histori'],
                ['containers.id', $id],
            ])
            ->first();

        return view('admin.tentang_kami.histori.edit', [
            'edit_histori' => $edit_histori,
        ]);
    }
    public function update_histori_admin_tentangkami(Request $request, $id)
    {
        $this->validate($request, [
            'content_name' => 'required',
        ]);
        $ids = auth()->user()->id;
        $containers = DB::table('containers')
            ->where('id', $id)
            ->update([
                'container_name' => 'histori',
                'id_user' => $ids,
                'update_by' => $ids,
                'updated_at' => Carbon::now(),
            ]);

        $contain = DB::table('contents')
            ->where('id_container', $id)
            ->update([
                'content_name' => $request->content_name,
                'id_container' => $id,
                'id_user' => $ids,
                'update_by' => $ids,
                'updated_at' => Carbon::now(),
            ]);
        Toastr::success('successfully update :)', 'Success');
        return redirect()->route('admin.admin_tentangkami');
    }
    public function delete_histori_admin_tentangkami($id)
    {
        $del_founder = DB::table('content__statuses')
            ->join(
                'contents',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )

            ->where([['contents.id_container', $id]]);
        $del = $del_founder->delete();

        $del_founder2 = DB::table('containers')
            ->where('id', $id)
            ->delete();
        Toastr::success('successfully Hapus :)', 'Success');
        return redirect()->back();
    }

    /**
     *
     * ADMIN KONTAK
     */
    public function admin_kontak()
    {
        $admin_kontak = Company_Identity::latest()->first();

        // $admin_contak = Company_Identity::where('id', $id)->firstOrFail();
        //$tentang_kami = DB::table('company__identities')->get();
        return view('admin.kontak.show', compact('admin_kontak'));
    }

    public function add_admin_kontak()
    {
        return view('admin.kontak.create');
    }

    public function store_admin_kontak(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'address' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'num_phone' => 'required',
            'email' => 'required',
        ]);
        // $company = Company_Identity::find($id);
        $company = new Company_Identity();
        $ids = auth()->user()->id_role;
        $company->company_name = $request->company_name;
        $company->address_name = $request->address;
        $company->facebook = $request->facebook;
        $company->instagram = $request->instagram;
        $company->youtube = $request->youtube;
        $company->num_phone = $request->num_phone;
        $company->update_by = $ids;
        $company->email = $request->email;
        $company->updated_at = Carbon::now();
        $company->created_at = Carbon::now();
        $company->save();
        Toastr::success('successfully save :)', 'Success');
        return redirect()->route('admin.admin_kontak');
    }

    public function edit_admin_kontak($id)
    {
        $edt_adminkontak = Company_Identity::where('id', $id)->firstOrFail();
        return view('admin.kontak.edit', compact('edt_adminkontak'));
    }

    public function update_admin_kontak(Request $request, $id)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'address_name' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'num_phone' => 'required',
            'email' => 'required',
        ]);

        $ids = auth()->user()->id_role;
        $company = Company_Identity::find($id);
        $company->company_name = $request->company_name;
        $company->address_name = $request->address_name;
        $company->facebook = $request->facebook;
        $company->instagram = $request->instagram;
        $company->youtube = $request->youtube;
        $company->num_phone = $request->num_phone;
        $company->update_by = $ids;
        $company->email = $request->email;
        $company->updated_at = Carbon::now();
        $company->created_at = Carbon::now();
        $company->save();
        Toastr::success('Ubah berhasil', 'Success');
        return redirect()->route('admin.admin_kontak');
    }

    public function delete_admin_kontak($id)
    {
        $kontak = Company_Identity::findOrFail($id);
        $kontak->delete();
        Toastr::success('successfully delete :)', 'Success');
        return redirect()->back();
    }

    /**
     * VISI MISI
     */
    public function create_admin_visimisi()
    {
        return view('admin.tentang_kami.visidanmisi.create');
    }
    public function store_admin_visimisi(Request $request)
    {
        $this->validate($request, [
            'content_name' => 'required',
        ]);
        $ids = auth()->user()->id;
        $containers = DB::table('containers')->insertGetId([
            'container_name' => 'visidanmisi',
            'id_user' => $ids,
            'update_by' => $ids,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $ct = DB::table('contents')->insertGetId([
            'content_name' => $request->content_name,
            'id_container' => $containers,
            'id_content_status' => 1,
            'id_user' => $ids,
            'update_by' => $ids,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Toastr::success('successfully save :)', 'Success');
        return redirect()->route('admin.admin_tentangkami');
    }
    public function edit_admin_visimisi($id)
    {
        $edit_visimisi = DB::table('containers')
            ->join('contents', 'containers.id', '=', 'contents.id_container')
            ->join(
                'content__statuses',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )
            ->where([
                ['containers.container_name', 'visidanmisi'],
                ['containers.id', $id],
            ])
            ->first();

        return view('admin.tentang_kami.visidanmisi.edit', [
            'edit_visimisi' => $edit_visimisi,
        ]);
    }
    public function update_admin_visimisi(Request $request, $id)
    {
        $this->validate($request, [
            'content_name' => 'required',
        ]);
        $ids = auth()->user()->id;
        $containers = DB::table('containers')
            ->where('id', $id)
            ->update([
                'container_name' => 'visidanmisi',
                'id_user' => $ids,
                'update_by' => $ids,
                'updated_at' => Carbon::now(),
            ]);
        $contain = DB::table('contents')
            ->where('id_container', $id)
            ->update([
                'content_name' => $request->content_name,
                'id_container' => $id,
                'id_user' => $ids,
                'update_by' => $ids,
                'updated_at' => Carbon::now(),
            ]);
        Toastr::success('successfully update :)', 'Success');
        return redirect()->route('admin.admin_tentangkami');
    }
    public function delete_admin_visimisi($id)
    {
        $del_founder = DB::table('content__statuses')
            ->join(
                'contents',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )

            ->where([['contents.id_container', $id]]);
        $del = $del_founder->delete();

        $del_founder2 = DB::table('containers')
            ->where('id', $id)
            ->delete();
        Toastr::success('successfully Hapus :)', 'Success');
        return redirect()->back();
    }

    public function kontak_us()
    {
        $s_pesan = kontak_us::latest()->get();
        $total = count(Kontak_us::latest()->get());
        return view('admin.kotak_masuk.show', [
            's_pesan' => $s_pesan,
            'total' => $total,
        ]);
    }

    public function delete_kontak_us($id)
    {
        $del = kontak_us::findOrFail($id);
        $del->delete();
        Toastr::success('successfully Hapus :)', 'Success');
        return redirect()->back();
    }
}
