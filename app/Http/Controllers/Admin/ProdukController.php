<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Item;
use App\Models\Item_Content;
use Auth;
use Illuminate\Support\Facades\URL;
use DB;
use File;
use Toastr;
use RealRashid\SweetAlert\Facades\Alert;
use Hash;
use Carbon\Carbon;
use Image;
use Storage;
use Session;
use Cookie;

class ProdukController extends Controller
{
    public function create_admin_produk()
    {
        $cat = DB::table('category__items')->get();
        return view('admin.produk.create', ['cat' => $cat]);
    }

    public function show_admin_produk(Request $request)
    {
        $ids = auth()->user()->id;
        // $item = DB::table('items')
        $item = Item::join(
            'item__contents',
            'items.id',
            '=',
            'item__contents.id_item'
        )
            ->select('item__contents.*', 'items.*')
            ->where('items.update_by', $ids)
            ->get();

        if (isset($request->search)) {
            $item = DB::table('items')
                ->join(
                    'item__contents',
                    'items.id',
                    '=',
                    'item__contents.id_item'
                )
                ->where('items.item_name', 'LIKE', '%' . $request->search . '%')
                ->get();
            $coll = collect($item);
            $coll->search($request->search);
        }

        if (isset($request->status)) {
            if ($request->status == 'out') {
                $item = DB::table('items')
                    ->join(
                        'item__contents',
                        'items.id',
                        '=',
                        'item__contents.id_item'
                    )
                    ->where('items.total_stock', '=', 0)
                    ->get();
                $coll = collect($item);
            } else {
                $item = DB::table('items')
                    ->join(
                        'item__contents',
                        'items.id',
                        '=',
                        'item__contents.id_item'
                    )
                    ->where('items.total_stock', '!=', 0)
                    ->get();
                $coll = collect($item);
            }
        }

        $coll = collect($item);
        $item = $coll->groupBy('id_item');

        return view('admin.produk.show', ['item' => $item]);
    }

    public function store_admin_produk(Request $request)
    {
        $this->validate($request, [
            'item_name' => 'required',
            'detail_product' => 'required',
            'price' => 'required',
            'total_stock' => 'required',
            'photo' => 'required',
        ]);
        $ids = auth()->user()->id;

        $s_item = DB::table('items')->insertGetId([
            'item_name' => $request->item_name,
            'detail_product' => $request->detail_product,
            'price' => $request->price,
            'total_sold' => 0,
            'status_item' => true,
            'total_stock' => $request->total_stock,
            'update_by' => $ids,
            'id_category_item' => $request->id_category_item,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if (isset($request->photo)) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $resource = $request->file('photo');

            foreach ($resource as $key => $resources) {
                $item = $s_item[$key];
                $names = $resources->getClientOriginalName();
                $extension = $resources->getClientOriginalExtension();
                $name = $resources->hashName();
                $img_path = public_path('/image/product');
                // $resources->move(
                //     \base_path() . '/public/image/product/',
                //     $name
                // );
                $newImage = Image::make($resource[$key]->getRealPath());
                // $thumb_img = Image::make($photo->getRealPath())->resize(500, 500);
                $newImage->resize(600, 680)->save($img_path . '/' . $name);
                $newPath = URL::asset('/image/product') . '/';
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $img = DB::table('item__contents')->insertGetId([
                        'photo' => $name,
                        'update_by' => $ids,
                        'id_item' => $s_item,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                    $y[] = $img;
                }
            }
        }

        if (isset($request->video)) {
            $allowedfileExtension = ['video', 'mp4'];
            $resource = $request->file('video');

            foreach ($resource as $key => $resources) {
                $names = $resources->getClientOriginalName();
                $extension = $resources->getClientOriginalExtension();
                $name = $resources->hashName();
                $resources->move(
                    \base_path() . '/public/video/product/',
                    $name
                );
                $newPath = URL::asset('/video/product') . '/';
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $vid = DB::table('item__contents')

                        ->where('id_item', [$s_item])
                        ->update([
                            'video' => $name,
                        ]);
                }
            }
        }

        Toastr::success('Success', 'save success');
        return redirect()->back();
    }

    public function edit_admin_produk($id)
    {
        $e_content = DB::table('item__contents')
            ->where('id_item', $id)
            ->get();

        $e_item = DB::table('items')
            ->where('id', $id)
            ->first();
        // ->get();
        $e_category = DB::table('category__items')->get();

        return view('admin.produk.edit', [
            'e_item' => $e_item,
            'e_content' => $e_content,
            'e_category' => $e_category,
        ]);
    }

    public function update_admin_produk(Request $request, $id)
    {
        $this->validate($request, [
            'item_name' => 'required',
            'detail_product' => 'required',
            'price' => 'required',
            'total_stock' => 'required',
        ]);
        $ids = auth()->user()->id;

        $s_item = DB::table('items')
            ->where('id', $id)
            ->update([
                'item_name' => $request->item_name,
                'id_category_item' => $request->id_category_item,
                'detail_product' => $request->detail_product,
                'price' => $request->price,
                'total_stock' => $request->total_stock,
                'update_by' => $ids,
                'updated_at' => Carbon::now(),
            ]);

        Toastr::success('Success', 'save success');
        return redirect()->back();

        // }
    }

    public function update_admin_img_produk(Request $request, $id)
    {
        $ids = auth()->user()->id;
        if (isset($request->photo)) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $resource = $request->file('photo');
            $names = $resource->getClientOriginalName();
            $extension = $resource->getClientOriginalExtension();
            $name = $resource->hashName();
            // $resource->move(\base_path() . '/public/image/product/', $name);
            $newPath = URL::asset('/image/product') . '/';

            $img_path = public_path('/image/product');
            $newImage = Image::make($resource->getRealPath());
            // $thumb_img = Image::make($photo->getRealPath())->resize(500, 500);
            $newImage->resize(600, 680)->save($img_path . '/' . $name);

            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $img = DB::table('item__contents')
                    ->where('id', $id)
                    ->update([
                        'photo' => $name,
                        'update_by' => $ids,
                        // 'id_item' => $s_item,
                        // 'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
            }
            Toastr::success('Success', 'save success');
            return redirect()->back();
        } elseif (isset($request->video)) {
            $allowedfileExtension = ['video', 'mp4'];
            $resource = $request->file('video');
            $names = $resource->getClientOriginalName();
            $extension = $resource->getClientOriginalExtension();
            $name = $resource->hashName();
            $resource->move(\base_path() . '/public/video/product/', $name);
            $newPath = URL::asset('/video/product') . '/';
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $img = DB::table('item__contents')
                    ->where('id', $id)
                    ->update([
                        'video' => $name,
                        'update_by' => $ids,
                        // 'id_item' => $s_item,
                        // 'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
            }
            Toastr::success('Success', 'save success');
            return redirect()->back();
        } else {
            Toastr::error('Error', 'Video / Image  Kosong');
            return redirect()->back();
        }
    }
    public function delete_admin_produk($id)
    {
        $item = Item_Content::join(
            'items',
            'item__contents.id_item',
            '=',
            'items.id'
        )
            ->join(
                'category__items',
                'items.id_category_item',
                '=',
                'category__items.id'
            )

            ->where('item__contents.id_item', $id)
            ->delete();

        Item::where('id', $id)->delete();

        Toastr::success('successfully delete :)', 'Success');
        return redirect()->back();
    }
}
