<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\User;
use App\Models\Company_Identity;
use Illuminate\View\View;
use DB;
use App\Models\Item;
use App\Models\Kontak_us;
use Brian2694\Toastr\Facades\Toastr;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $item = Item::join(
            'item__contents',
            'items.id',
            '=',
            'item__contents.id_item'
        )
            ->join('users', 'items.update_by', '=', 'users.id')
            ->orderBy('items.id', 'DESC')
            ->get();
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
            ->where([
                ['containers.container_name', 'section_pengenalan'],
                ['contents.id_content_status', 1],
            ])
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
            ->where([
                ['containers.container_name', 'section_testimoni'],
                ['contents.id_content_status', 1],
            ])
            ->get();

        $pop = collect($item);
        // $filter = $pop->whereNotIn('total_sold', [0]);
        $popular = $pop->groupBy('id_item')->take(4);

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
            ->take(6)
            ->get();

        return view('home', [
            // 'foo_kontak' => $foo_kontak,
            // 'c_founder' => $c_founder,
            'popular' => $popular,
            'section_p' => $section_p,
            'section_t' => $section_t,
            'section_v' => $section_v,
        ]);
    }

    public function show_blog(Request $request)
    {
        $randomBlog = News::inRandomOrder()
            ->limit(6)
            ->get();
        // $s_news = User::join('news', 'users.id', '=', 'news.id_user')->join(
        //     'roles',
        //     'users.id_role',
        //     '=',
        //     'roles.id'
        // );

        if (isset($request->search)) {
            $show_news = News::where(
                'title',
                'LIKE',
                '%' . $request->search . '%'
            )->paginate(10);
        } else {
            $show_news = News::paginate(10);
        }

        return view('pages.blog.show', [
            'show_news' => $show_news,
            'randomBlog' => $randomBlog,
        ]);
    }

    public function blog_detail($id)
    {
        $detail_blog = News::join('users', 'users.id', 'news.id_user')
            ->join('roles', 'users.id_role', '=', 'roles.id')
            ->where('news.id', $id)
            ->first();
        $randomBlog = News::inRandomOrder()
            ->limit(4)
            ->get();
        return view('pages.blog.detail', [
            'detail_blog' => $detail_blog,
            'randomBlog' => $randomBlog,
        ]);
    }

    public function tentang_kami()
    {
        $c_founder = DB::table('containers')
            ->join('contents', 'containers.id', '=', 'contents.id_container')
            ->join(
                'content__statuses',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )
            ->orderBy('containers.id', 'DESC')
            ->where('containers.container_name', 'founder')
            ->first();

        $c_history = DB::table('containers')
            ->join('contents', 'containers.id', '=', 'contents.id_container')
            ->join(
                'content__statuses',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )
            ->where('containers.container_name', 'histori')
            ->first();
        $c_visimisi = DB::table('containers')
            ->join('contents', 'containers.id', '=', 'contents.id_container')
            ->join(
                'content__statuses',
                'content__statuses.id',
                '=',
                'contents.id_content_status'
            )
            ->where('containers.container_name', 'visidanmisi')
            ->first();

        return view('pages.tentang_kami', [
            'c_founder' => $c_founder,
            'c_history' => $c_history,
            'c_visimisi' => $c_visimisi,
        ]);
    }

    public function kontak()
    {
        $kontak = Company_Identity::first();
        return view('pages.kontak', ['kontak' => $kontak]);
    }

    public function popular_produk()
    {
    }

    public function compose(View $view)
    {
        $fk = Company_Identity::orderBy('id', 'DESC')->first();
        $view->with('fk', $fk);
    }

    public function store_kontak_us(Request $request)
    {
        $this->validate(
            $request,
            [
                'nama' => 'required',
                'nomor_hp' => 'required',
                'email' => 'required',
                'pesan' => 'required',
            ],
            [
                'required' => 'Wajib Diisi',
            ]
        );
        $saved = new Kontak_us();
        $saved->nama = $request->nama;
        $saved->nomor_hp = $request->nomor_hp;
        $saved->email = $request->email;
        $saved->pesan = $request->pesan;
        $saved->save();
        Toastr::success('success', 'Pesan Terkirim');
        return redirect()->route('home.index');
    }
}
