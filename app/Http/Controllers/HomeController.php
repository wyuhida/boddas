<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\User;
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
        return view('home');
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
}
