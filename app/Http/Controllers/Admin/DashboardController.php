<?php
/**
 * Created by PhpStorm.
 * User: goran
 * Date: 16/06/15
 * Time: 06:45
 */

namespace LaravelBlog\Http\Controllers\Admin;

use LaravelBlog\Http\Controllers\AdminController;
use LaravelBlog\Blog;
use LaravelBlog\BlogCategory;
use LaravelBlog\Blogger;
use LaravelBlog\Http\Controllers\Controller;
use LaravelBlog\Photo;
use LaravelBlog\Album;


class DashboardController extends AdminController {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $title = "Dashboard";

        $blogs = Blog::count();
        $blogscategory = BlogCategory::count();
        $bloggers = Blogger::count();
        $photo = Photo::count();
        $album =Album::count();
        return view('admin.dashboard.index',  compact('title','blogs','blogscategory','photo',
            'album','bloggers'));
    }

}
