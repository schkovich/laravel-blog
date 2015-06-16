<?php
/**
 * Created by PhpStorm.
 * User: goran
 * Date: 16/06/15
 * Time: 06:43
 */

namespace LaravelBlog\Http\Controllers;


class AdminController extends Controller {

    /**
     * Initializer.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

}
