<!DOCTYPE html>

<html lang="en">

<head id="Starter-Site">

    <meta charset="UTF-8">

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Administration</title>

    <meta name="keywords" content="@yield('keywords')" />
    <meta name="author" content="@yield('author')" />
    <!-- Google will often use this as its description of your page/site. Make it good. -->
    <meta name="description" content="@yield('description')" />
    <!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
    <meta name="google-site-verification" content="">
    <!-- Dublin Core Metadata : http://dublincore.org/ -->
    <meta name="DC.title" content="Project Name">
    <meta name="DC.subject" content="@yield('description')">
    <meta name="DC.creator" content="@yield('author')">
    <!--  Mobile Viewport Fix -->
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!-- CSS -->
    <link href="{{{ asset('assets/css/app.css') }}}"
          rel="stylesheet" type="text/css">
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!-- start: Favicon and Touch Icons -->
    <link rel="shortcut icon"
          href="{{{ asset('favicon.ico') }}}">
    <!-- end: Favicon and Touch Icons -->
</head>
<body>
<!-- Container -->
<div class="container">
    <div class="page-header"></div>
    <div class="pull-right">
        <button class="btn btn-primary btn-sm close_popup">
            <span class="glyphicon glyphicon-backward"></span> {{{
				trans('admin/admin.back') }}}
        </button>
    </div>
    <!-- Content -->
    @yield('content')
    <!-- ./ content -->
</div>
<!-- ./ container -->
<!-- start: JavaScript-->
<!--[if !IE]>-->
<script src="{{{ asset('js/all.js') }}}"></script>
<!--<![endif]-->
<!--[if IE]>
<script src="{{{ asset('assets/admin/js/jquery-1.11.1.min.js') }}}"></script>
<![endif]-->
<script type="text/javascript">
    $(function() {
        $('textarea').summernote({height: 250});
        $('form').submit(function(event) {
            event.preventDefault();
            var form = $(this);

            if (form.attr('id') == '' || form.attr('id') != 'fupload'){
                $.ajax({
                    type : form.attr('method'),
                    url : form.attr('action'),
                    data : form.serialize()
                }).success(function() {
                    setTimeout(function() {
                        parent.$.colorbox.close();
                        window.parent.location.reload();
                    }, 10);
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    // Optionally alert the user of an error here...
                    var textResponse = jqXHR.responseText;
                    var alertText = "One of the following conditions is not met:\n\n";
                    var jsonResponse = jQuery.parseJSON(textResponse);

                    $.each(jsonResponse, function(n, elem) {
                        alertText = alertText + elem + "\n";
                    });
                    alert(alertText);
                });
            }
            else{
                var formData = new FormData(this);
                $.ajax({
                    type : form.attr('method'),
                    url : form.attr('action'),
                    data : formData,
                    mimeType:"multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData:false
                }).success(function() {
                    setTimeout(function() {
                        parent.$.colorbox.close();
                        window.parent.location.reload();
                    }, 10);

                }).fail(function(jqXHR, textStatus, errorThrown) {
                    // Optionally alert the user of an error here...
                    var textResponse = jqXHR.responseText;
                    var alertText = "One of the following conditions is not met:\n\n";
                    var jsonResponse = jQuery.parseJSON(textResponse);

                    $.each(jsonResponse, function(n, elem) {
                        alertText = alertText + elem + "\n";
                    });

                    alert(alertText);
                });
            };
        });

        $('.close_popup').click(function() {
            parent.$.colorbox.close()
            window.parent.location.reload();
        });
    });
</script>
@yield('scripts')
</body>
</html>
