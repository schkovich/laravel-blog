<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@section('title') Laravel Blog Test Work @show</title>
    @section('meta_keywords')
        <meta name="keywords" content="laravel, blog, test, work"/>
    @show @section('meta_author')
        <meta name="author" content="Jon Doe"/>
    @show @section('meta_description')
        <meta name="description"
              content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei."/>
    @show

    {{--		<link href="{{ asset('/css/all.css') }}" rel="stylesheet">--}}
    <link href="{{asset('css/all.css')}}" rel="stylesheet">

    {{--<link rel="stylesheet"--}}
          {{--href="{{asset('assets/site/css/half-slider.css')}}">--}}
    {{--<link rel="stylesheet"--}}
          {{--href="{{asset('assets/site/css/justifiedGallery.min.css')}}"/>--}}
    {{--<link rel="stylesheet"--}}
          {{--href="{{asset('assets/site/css/lightbox.min.css')}}"/>--}}

    @yield('styles')

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="{{{ asset('assets/site/ico/favicon.ico') }}}">
</head>
<body>
@include('partials.nav')

@include('vendor.flash.message')
<div class="container">
    @yield('content')
</div>
@include('partials.footer')

<!-- Scripts -->
{{--<script src="{{ asset('/js/all.js') }}"></script>--}}
<script src="{{ asset('js/all.js') }}"></script>

{{--<script src="{{asset('assets/site/js/jquery.justifiedGallery.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/site/js/lightbox.min.js')}}"></script>--}}

<script type="text/javascript">
    $('#flash-overlay-modal').modal();
    $('div.alert').not('.alert-danger').delay(3000).slideUp(300);
</script>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'novamedev';

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
</script>
@yield('scripts')

</body>
</html>
