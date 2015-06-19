<?php
/**
 * Created by PhpStorm.
 * User: goran
 * Date: 18/06/15
 * Time: 07:00
 */

namespace LaravelBlog\Http\Controllers\Admin;

use Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use LaravelBlog\Helpers\Thumbnail;
use LaravelBlog\Http\Controllers\AdminController;
use LaravelBlog\Http\Requests\Admin\DeleteRequest;
use LaravelBlog\Http\Requests\Admin\PhotoRequest;
use LaravelBlog\Http\Requests\Admin\ReorderRequest;
use LaravelBlog\Language;
use LaravelBlog\Photo;
use LaravelBlog\Album;

class PhotoController extends AdminController
{
    /**
     * Show a list of all the photo posts.
     *
     * @return View
     */
    public function index()
    {
        // Show the page
        return view('admin.photo.index');
    }

    /**
     * Show a list of all the photo posts.
     *
     * @return View
     */
    public function itemsForAlbum($id)
    {
        $album = PhotoAlbum::find($id);

        // Show the page
        return view('admin.photo.index', compact('album'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        $languages   = Language::all();
        $language    = "";
        $albums = Album::all();
        $album  = "";

        // Show the page
        return view('admin.photo.create_edit', compact('languages', 'language', 'albums', 'album'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PhotoRequest $request
     */
    public function postCreate(PhotoRequest $request)
    {
        $photo                 = new Photo();
        $photo->blogger_id        = Auth::id();
        $photo->language_id    = $request->language_id;
        $photo->name           = $request->name;
        $photo->album_id       = $request->album_id;
        $photo->description    = $request->description;
        $photo->slider         = $request->slider;
        $photo->album_cover    = $request->album_cover;
        $picture               = "";
        var_dump($photo);
        exit;
        if($request->hasFile('image')) {
            $file      = $request->file('image');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture   = sha1($filename . time()) . '.' . $extension;
        }
        $photo->filename = $picture;
        $photo->save();
        if($request->hasFile('image')) {
            $album      = Album::find($request->album_id);
            $destinationPath = public_path() . '/appfiles/album/' . $album->folder_id . '/';
            $request->file('image')->move($destinationPath, $picture);
            $path2 = public_path() . '/appfiles/album/' . $album->folder_id . '/thumbs/';
            Thumbnail::generate_image_thumbnail($destinationPath . $picture, $path2 . $picture);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function getEdit($id)
    {
        $photo       = Photo::find($id);
        $languages   = Language::all();
        $language    = $photo->language_id;
        $albums = Album::all();
        $album  = $photo->album_id;

        return view('admin.photo.create_edit', compact('photo', 'languages', 'language', 'albums', 'album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function postEdit(PhotoRequest $request, $id)
    {
        $photo                 = Photo::find($id);
        $photo->blogger_id        = Auth::id();
        $photo->language_id    = $request->language_id;
        $photo->name           = $request->name;
        $photo->album_id       = $request->album_id;
        $photo->description    = $request->description;
        $photo->slider         = $request->slider;
        $photo->album_cover    = $request->album_cover;
        $picture               = $photo->filename;
        if($request->hasFile('image')) {
            $file      = $request->file('image');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture   = sha1($filename . time()) . '.' . $extension;
        }
        $photo->filename = $picture;
        $photo->save();
        if($request->hasFile('image')) {
            $album      = Album::find($request->album_id);
            $destinationPath = public_path() . '/appfiles/album/' . $album->folder_id . '/';
            $request->file('image')->move($destinationPath, $picture);
            $path2 = public_path() . '/appfiles/album/' . $album->folder_id . '/thumbs/';
            Thumbnail::generate_image_thumbnail($destinationPath . $picture, $path2 . $picture);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return Response
     */
    public function getDelete($id)
    {
        $photo = Photo::find($id);

        // Show the page
        return view('admin.photo.delete', compact('photo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return Response
     */
    public function postDelete(DeleteRequest $request, $id)
    {
        $photo = Photo::find($id);
        $photo->delete();
    }

    /**
     * Set a Album cover.
     *
     * @param $id
     *
     * @return Response
     */
    public function getAlbumCover($id, $album = 0)
    {
        $photo       = Photo::find($id);
        $albums = Photo::where('album_id', $photo->album_id)->get();
        foreach ($albums as $item) {
            $item->album_cover = 0;
            $item->save();
        }
        $photo->album_cover = 1;
        $photo->save();

        // Show the page
        return redirect(( ( $album == 0 ) ? '/admin/photo' : '/admin/photo/' . $album . '/itemsforalbum' ));
    }

    public function getSlider($id, $album = 0)
    {
        $photo         = Photo::find($id);
        $photo->slider = ( $photo->slider + 1 ) % 2;
        $photo->save();

        // Show the page
        return redirect(( ( $album == 0 ) ? '/admin/photo' : '/admin/photo/' . $album . '/itemsforalbum' ));
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data($albumid = 0)
    {
        $condition  = ( intval($albumid) == 0 ) ? ">" : "=";
        $album = Photo::join('languages', 'languages.id', '=', 'photos.language_id')
                           ->join('albums', 'albums.id', '=', 'photos.album_id')
                           ->where('photos.album_id', $condition, $albumid)
                           ->orderBy('photos.position')
                           ->select(array(
                               'photos.id',
                               DB::raw($albumid . ' as albumid'),
                               DB::getTablePrefix() . 'photos.name',
                               'albums.name as category',
                               DB::getTablePrefix() . 'photos.album_cover',
                               DB::getTablePrefix() . 'photos.slider',
                               'languages.name as language',
                               DB::getTablePrefix() . 'photos.created_at'
                           ));

        return Datatables::of($album)
                         ->edit_column('album_cover',
                             '<a href="{{{ URL::to(\'admin/photo/\' . $id . \'/\' . $albumid . \'/albumcover\' ) }}}" class="btn btn-warning btn-sm" >@if ($album_cover=="1") <span class="glyphicon glyphicon-ok"></span> @else <span class=\'glyphicon glyphicon-remove\'></span> @endif</a>')
                         ->edit_column('slider',
                             '<a href="{{{ URL::to(\'admin/photo/\' . $id . \'/\' . $albumid . \'/slider\' ) }}}" class="btn btn-warning btn-sm" >@if ($slider=="1") <span class=\'glyphicon glyphicon-ok\'></span> @else <span class=\'glyphicon glyphicon-remove\'></span> @endif</a>')
                         ->add_column('actions', '<a href="{{{ URL::to(\'admin/photo/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                <a href="{{{ URL::to(\'admin/photo/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
                <input type="hidden" name="row" value="{{$id}}" id="row">')->remove_column('id')
                         ->remove_column('albumid')->make(true);
    }

    /**
     * Reorder items
     *
     * @param items list
     *
     * @return items from @param
     */
    public function getReorder(ReorderRequest $request)
    {
        $list  = $request->list;
        $items = explode(",", $list);
        $order = 1;
        foreach ($items as $value) {
            if($value != '') {
                Photo::where('id', '=', $value)->update(array( 'position' => $order ));
                $order ++;
            }
        }

        return $list;
    }

}
