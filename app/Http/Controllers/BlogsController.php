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

    public function show($slug)
    {
        // Get all the blog posts
        $blog = Blog::findBySlugOrId($slug);

        return view('blogs.show', compact('blog'));
    }

    public function data($offset = 10)
    {
        $blogs = Blog::with('author')->orderBy('position', 'DESC')
            ->orderBy('created_at', 'DESC')
            ->offset($offset)
            ->limit(10)->get();
        return response()->json($blogs);
    }
}
