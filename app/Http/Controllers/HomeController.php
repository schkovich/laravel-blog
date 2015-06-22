<?php
/**
 * Created by PhpStorm.
 * User: goran
 * Date: 15/06/15
 * Time: 05:04
 */

namespace LaravelBlog\Http\Controllers;

use Illuminate\Database\Eloquent;
use LaravelBlog\Blog;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        //$this->middleware('auth');
        //parent::__construct();
        //$this->blogs = $blogs;
        //$this->user = $user;
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $blogs = Blog::where('published', '=', true)->with('author')
            ->orderBy('position', 'DESC')
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->get();
        return view('pages.home', compact('blogs', 'sliders'));
    }

}
