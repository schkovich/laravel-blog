@extends('admin.layouts.modal') {{-- Content --}} @section('content')
    <!-- Tabs -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-general" data-toggle="tab"> {{
			trans("admin/modal.general") }}</a></li>
    </ul>
    <!-- ./ tabs -->
    {{-- Edit Blog Form --}}
    <form class="form-horizontal" enctype="multipart/form-data"
          method="post"
          action="@if(isset($blogs)){{ URL::to('admin/blogs/'.$blogs->id.'/edit') }}
	        @else{{ URL::to('admin/blogs/store') }}@endif"
          autocomplete="off">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <!-- ./ csrf token -->
        <!-- Tabs Content -->
        <div class="tab-content">
            <!-- General tab -->
            <div class="tab-pane active" id="tab-general">
                <div class="tab-pane active" id="tab-general">
                    <div
                            class="form-group {{{ $errors->has('language_id') ? 'has-error' : '' }}}">
                        <div class="col-md-12">
                            <label class="control-label" for="language_id">{{
							trans("admin/admin.language") }}</label> <select
                                    style="width: 100%" name="language_id" id="language_id"
                                    class="form-control"> @foreach($languages as $item)
                                    <option value="{{$item->id}}"
                                    @if(!empty($language))
                                        @if($item->id==$language)
                                            selected="selected" @endif @endif >{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div
                            class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
                        <div class="col-md-12">
                            <label class="control-label" for="title"> {{
							trans("admin/modal.title") }}</label> <input
                                    class="form-control" type="text" name="title" id="title"
                                    value="{{{ Input::old('title', isset($blogs) ? $blogs->title : null) }}}" />
                            {!!$errors->first('title', '<label class="control-label">:message</label>')!!}
                        </div>
                    </div>
                    <div
                            class="form-group {{{ $errors->has('blogcategory_id') ? 'error' : '' }}}">
                        <div class="col-md-12">
                            <label class="control-label" for="blogcategory_id">{{
							trans("admin/blogs.category") }}</label> <select
                                    style="width: 100%" name="blogcategory_id" id="blogcategory_id"
                                    class="form-control"> @foreach($blogscategories as $item)
                                    <option value="{{$item->id}}"
                                    @if(!empty($blogscategory))
                                        @if($item->id==$blogscategory)
                                            selected="selected" @endif @endif >{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div
                            class="form-group {{{ $errors->has('introduction') ? 'has-error' : '' }}}">
                        <div class="col-md-12">
                            <label class="control-label" for="introduction">{{
							trans("admin/blogs.introduction") }}</label>
						<textarea class="form-control full-width wysihtml5"
                                  name="introduction" value="introduction" rows="10">{{{ Input::old('introduction', isset($blogs) ? $blogs->introduction : null) }}}</textarea>
                            {!! $errors->first('introduction', '<label class="control-label">:message</label>')
                            !!}
                        </div>
                    </div>
                    <div
                            class="form-group {{{ $errors->has('content') ? 'has-error' : '' }}}">
                        <div class="col-md-12">
                            <label class="control-label" for="content">{{
							trans("admin/blogs.content") }}</label>
						<textarea class="form-control full-width wysihtml5" name="content"
                                  value="content" rows="10">{{{ Input::old('content', isset($blogs) ? $blogs->content : null) }}}</textarea>
                            {!! $errors->first('content', '<label class="control-label">:message</label>')
                            !!}
                        </div>
                    </div>
                    <div
                            class="form-group {{{ $errors->has('source') ? 'error' : '' }}}">
                        <div class="col-md-12">
                            <label class="control-label" for="title">{{
							trans("admin/blogs.source") }}</label> <input
                                    class="form-control" type="text" name="source" id="source"
                                    value="{{{ Input::old('source', isset($blogs) ? $blogs->source : null) }}}" />
                            {!! $errors->first('source', '<label class="control-label">:message</label>')
                            !!}
                        </div>
                    </div>
                    <div
                            class="form-group {{{ $errors->has('picture') ? 'error' : '' }}}">
                        <div class="col-lg-12">
                            <label class="control-label" for="picture">{{
							trans("admin/blogs.picture") }}</label> <input name="picture"
                                                                          type="file" class="uploader" id="picture" value="Upload" />
                        </div>

                    </div>
                    <!-- ./ general tab -->
                </div>
                <!-- ./ tabs content -->

                <!-- Form Actions -->

                <div class="form-group">
                    <div class="col-md-12">
                        <button type="reset" class="btn btn-sm btn-warning close_popup">
                            <span class="glyphicon glyphicon-ban-circle"></span> {{
						trans("admin/modal.cancel") }}
                        </button>
                        <button type="reset" class="btn btn-sm btn-default">
                            <span class="glyphicon glyphicon-remove-circle"></span> {{
						trans("admin/modal.reset") }}
                        </button>
                        <button type="submit" class="btn btn-sm btn-success">
                            <span class="glyphicon glyphicon-ok-circle"></span>
                            @if	(isset($blogs))
                                {{ trans("admin/modal.edit") }}
                            @else
                                {{trans("admin/modal.create") }}
                            @endif
                        </button>
                    </div>
                </div>
                <!-- ./ form actions -->
            </div>
        </div>
    </form>
@stop
