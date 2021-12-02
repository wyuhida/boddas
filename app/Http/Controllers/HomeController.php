<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\User;
use App\Models\Company_Identity;
use Illuminate\View\View;
use DB;

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
        ]);
    }

    public function show_blog(Request $request)
    {
        $randomBlog = News::inRandomOrder()
            ->limit(4)
            ->get();

        $show_news = User::join('news', 'users.id', '=', 'news.id_user')->join(
            'roles',
            'users.id_role',
            '=',
            'roles.id'
        );

        if (isset($request->search)) {
            $show_news->where(
                'news.title',
                'LIKE',
                '%' . $request->search . '%'
            );
        }

        $show_news = $show_news
            // ->get(['users.*', 'news.*', 'roles.*'])
            ->paginate(3);
        return view('pages.blog.show', [
            'show_news' => $show_news,
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

    public function compose(View $view)
    {
        $fk = Company_Identity::first();
        $view->with('fk', $fk);
    }
}
