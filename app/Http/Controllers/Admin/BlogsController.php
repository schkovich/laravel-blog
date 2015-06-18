<?php
/**
 * Created by PhpStorm.
 * User: goran
 * Date: 16/06/15
 * Time: 08:07
 */

namespace LaravelBlog\Http\Controllers\Admin;


use LaravelBlog\Http\Controllers\AdminController;
use LaravelBlog\Blog;
use LaravelBlog\BlogCategory;
use LaravelBlog\Language;
use Illuminate\Support\Facades\Input;
use LaravelBlog\Http\Requests\Admin\BlogRequest;
use LaravelBlog\Http\Requests\Admin\DeleteRequest;
use LaravelBlog\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class BlogsController extends AdminController {
    /*
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Show the page
        return view('admin.blogs.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        $languages = Language::all();
        $language = "";
        $blogscategories = BlogCategory::all();
        $blogscategory = "";
        // Show the page
        return view('admin.blogs.create_edit', compact('languages', 'language','blogscategories','blogscategory'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(BlogRequest $request)
    {
        $blogs = new Blog();
        $blogs -> user_id = Auth::id();
        $blogs -> language_id = $request->language_id;
        $blogs -> title = $request->title;
        $blogs -> blog_category_id = $request->blogscategory_id;
        $blogs -> introduction = $request->introduction;
//      @todo: Object Request has protected property content. Consider renaming column to blog_content.
        $blogs -> content = $request->content;
        $blogs -> source = $request->source;
        $picture = "";
        if(Input::hasFile('picture'))
        {
            $file = Input::file('picture');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
        }
        $blogs -> picture = $picture;
        $blogs -> save();
        if(Input::hasFile('picture'))
        {
            $destinationPath = public_path() . '/images/blogs/'.$blogs->id.'/';
            Input::file('picture')->move($destinationPath, $picture);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        $blogs = Blog::find($id);
        $languages = Language::all();
        $language = $blogs->language_id;
        $blogscategories = BlogCategory::all();
        $blogscategory = $blogs->blogscategory_id;
        return view('admin.blogs.create_edit',compact('blogs','languages','language','blogscategories','blogscategory'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postEdit(BlogsRequest $request, $id)
    {
        $blogs = Blog::find($id);
        $blogs -> user_id = Auth::id();
        $blogs -> language_id = $request->language_id;
        $blogs -> title = $request->title;
        $blogs -> blog_category_id = $request->blogscategory_id;
        $blogs -> introduction = $request->introduction;
        $blogs -> content = $request->content;
        $blogs -> source = $request->source;
        $picture = "";
        if(Input::hasFile('picture'))
        {
            $file = Input::file('picture');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
        }
        $blogs -> picture = $picture;
        $blogs -> save();
        if(Input::hasFile('picture'))
        {
            $destinationPath = public_path() . '/images/blogs/'.$blogs->id.'/';
            Input::file('picture')->move($destinationPath, $picture);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function getDelete($id)
    {
        $blogs = Blog::find($id);
        // Show the page
        return view('admin.blogs.delete', compact('blogs'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $blogs = Blog::find($id);
        $blogs->delete();
    }
    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $blogs = Blog::join('languages', 'languages.id', '=', 'blogs.language_id')
                       ->join('blog_categories', 'blog_categories.id', '=', 'blogs.blog_category_id')
                       ->select(array('blogs.id','blogs.title','blog_categories.title as category', 'languages.name', 'blogs.created_at'))
                       ->orderBy('blogs.position', 'ASC');
        return Datatables::of($blogs)
                         ->add_column('actions', '<a href="{{{ URL::to(\'admin/blogs/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/blogs/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
                    <input type="hidden" name="row" value="{{$id}}" id="row">')
                         ->remove_column('id')
                         ->make(true);
    }
    /**
     * Reorder items
     *
     * @param items list
     * @return items from @param
     */
    public function getReorder(ReorderRequest $request) {
        $list = $request->list;
        $items = explode(",", $list);
        $order = 1;
        foreach ($items as $value) {
            if ($value != '') {
                Blog::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }
}
