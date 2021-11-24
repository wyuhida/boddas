<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Company_Identity;
use DB;
use Auth;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class AdminCompanyController extends Controller
{
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
            ->get();

        return view('admin.tentang_kami.show', ['item' => $item]);
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
            ->first();

        return view('admin.tentang_kami.edit', [
            'edit_tentangkami' => $edit_tentangkami,
        ]);
    }

    /**
     *
     * ADMIN KONTAK
     */
    public function admin_kontak()
    {
        $admin_kontak = Company_Identity::all();
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
            'address_name' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
        ]);
        // $company = Company_Identity::find($id);
        $company = new Company_Identity();
        $ids = auth()->user()->id_role;
        $company->company_name = $request->company_name;
        $company->address_name = $request->address_name;
        $company->facebook = $request->facebook;
        $company->instagram = $request->instagram;
        $company->youtube = $request->youtube;
        $company->no_telp = $request->no_telp;
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
            'desc_company' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
        ]);

        $ids = auth()->user()->id_role;
        $company = Company_Identity::find($id);
        $company->company_name = $request->company_name;
        $company->desc_company = $request->desc_company;
        $company->facebook = $request->facebook;
        $company->instagram = $request->instagram;
        $company->youtube = $request->youtube;
        $company->no_telp = $request->no_telp;
        $company->update_by = $ids;
        $company->email = $request->email;
        $company->updated_at = Carbon::now();
        $company->created_at = Carbon::now();
        $company->save();
        Toastr::success('successfully updated :)', 'Success');
        return redirect()->route('admin.admin_kontak');
    }

    public function delete_admin_kontak($id)
    {
        $kontak = Company_Identity::findOrFail($id);
        $kontak->delete();
        Toastr::success('successfully delete :)', 'Success');
        return redirect()->back();
    }
}
