<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\User;
use App\Models\Company_Identity;
use Illuminate\View\View;
use DB;
use App\Models\Item;
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
            ->orderBy('items.total_sold', 'DESC')
            ->get();
        $pop = collect($item);
        $filter = $pop->whereNotIn('total_sold', [0]);
        $popular = $filter->groupBy('id_item');

        // $foo_kontak = Company_Identity::first();
        // $c_founder = DB::table('containers')
        //     ->join('contents', 'containers.id', '=', 'contents.id_container')
        //     ->join(
        //         'content__statuses',
        //         'content__statuses.id',
        //         '=',
        //         'contents.id_content_status'
        //     )
        //     ->where('containers.container_name', 'founder')
        //     ->first();
        return view('home', [
            // 'foo_kontak' => $foo_kontak,
            // 'c_founder' => $c_founder,
            'popular' => $popular,
        ]);
    }

    public function show_blog(Request $request)
    {
        $randomBlog = News::inRandomOrder()
            ->limit(4)
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

        return view('pages.tentang_kami', [
            'c_founder' => $c_founder,
            'c_history' => $c_history,
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
}
