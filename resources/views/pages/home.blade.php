@extends('laravel-blog')
@section('title') Home :: @parent @stop
@section('content')
    <div class="row">
        <div class="page-header">
            <h2>Home Page</h2>
        </div></div>

    @if(count($blogs)>0)
        <div class="row">
            <h2>Blogs</h2>
            @foreach ($blogs as $blog)
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>
                                <strong><a href="{{URL::to('blogs/'.$blog->id.'')}}">{!!
                                        $blog->title !!}</a></strong>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{URL::to('blogs/'.$blog->id.'')}}" class="thumbnail"><img
                                        src="http://placehold.it/260x180" alt=""></a>
                        </div>
                        <div class="col-md-10">
                            <p>{!! $blog->introduction !!}</p>

                            <p>
                                <a class="btn btn-mini btn-default"
                                   href="{{URL::to('blogs/'.$blog->id.'#disqus_thread')}}">Read more</a>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p></p>

                            <p>
                                <span class="glyphicon glyphicon-user"></span> by <span
                                        class="muted">{!! $blog->author->name !!}</span> | <span
                                        class="glyphicon glyphicon-calendar"></span> {!! $blog->created_at !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection

@stop
