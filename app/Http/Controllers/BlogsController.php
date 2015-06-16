<?php
/**
 * Created by PhpStorm.
 * User: goran
 * Date: 16/06/15
 * Time: 05:46
 */

namespace LaravelBlog\Http\Controllers;

use LaravelBlog\Blog;


class BlogsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
    }

    public function show($id)
    {
        // Get all the blog posts
        $blog = Blog::find($id);

        return view('blogs.show', compact('blog'));
    }

}
