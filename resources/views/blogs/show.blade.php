@extends('laravel-blog')

@section('content')

    <h1>Blogs</h1>

    <hr>

    <article>
        <h2>{{ $blog->title }}</h2>

        <div class="body">{{ $blog->content }}<div>
    </article>


@endsection
@stop
