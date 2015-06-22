@extends('laravel-blog')

@section('content')

    <h1>Blogs</h1>

    <hr>

    @foreach($blogs as $blog)
        <article>
            <h2><a href="{{action('ArticlesController@show', [$blog->id] . '#disqus_thread')}}"> {{ $blog->title }}</a></h2>

            <div class="body">{{$blog->excerpt}}<div>
        </article>
    @endforeach

@endsection
@stop
