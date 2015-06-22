@extends('laravel-blog')

@section('content')

    <h1>Blogs</h1>

    <hr/>

    <article>
        <h2>{{ $blog->title }}</h2>

        <div class="body">{{ $blog->content }}</div>
        <div id="disqus_thread"></div>
    </article>
@endsection
@stop
@section('scripts')
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES * * */
            var disqus_shortname = 'novamedev';

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
@stop
