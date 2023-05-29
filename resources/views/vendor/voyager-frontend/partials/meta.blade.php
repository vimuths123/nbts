<!--<!doctype html>
<html lang="en" class="no-js">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('meta_title', setting('site.title'))</title>
    <meta name="description" content="@yield('meta_description')">

     Open Graph 
    <meta property="og:site_name" content="{{ setting('site.title') }}" />
    <meta property="og:title" content="@yield('meta_title')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:image" content="@yield('meta_image', url('/') . '/images/apple-touch-icon.png')" />
    <meta property="og:description" content="@yield('meta_description', setting('site.description'))" />

     Icons 
    <meta name="msapplication-TileImage" content="{{ url('/') }}/ms-tile-icon.png" />
    <meta name="msapplication-TileColor" content="#8cc641" />
    <link rel="shortcut icon" href="{{ url('/') }}/images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" href="{{ url('/') }}/images/apple-touch-icon.png" />

     Styles 
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/app.css">

    @if (setting('site.google_analytics_tracking_id'))
     Google Analytics (gtag.js) 
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('site.google_analytics_tracking_id') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ setting('site.google_analytics_tracking_id') }}');
        </script>
    @endif
    @if (setting('admin.google_recaptcha_site_key'))
        <script src='https://www.google.com/recaptcha/api.js' async defer></script>
        <script>
            function setFormId(formId) {
                window.formId = formId;
            }

            function onSubmit(token) {
                document.getElementById(window.formId).submit();
            }
        </script>
    @endif

</head>
<body>-->
<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="utf-8">
        <title>@yield('meta_title', setting('site.title'))</title>
        <link rel="shortcut icon" href="/theme/img/icon.png">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('meta_description')">

        <!--Open Graph--> 
        <meta property="og:site_name" content="{{ setting('site.title') }}" />
        <meta property="og:title" content="@yield('meta_title')" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ url('/') }}" />
        <meta property="og:image" content="@yield('meta_image', url('/') . '/images/apple-touch-icon.png')" />
        <meta property="og:description" content="@yield('meta_description', setting('site.description'))" />

        <!--Icons--> 
        <meta name="msapplication-TileImage" content="{{ url('/') }}/ms-tile-icon.png" />
        <meta name="msapplication-TileColor" content="#8cc641" />

        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- css-include -->

        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        
        <!-- boorstrap -->
        <link rel="stylesheet" type="text/css" href="/theme/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('theme/css/bootstrap.min.css') }}">
        <!-- themify-icon.css -->
        <link rel="stylesheet" type="text/css" href="/theme/css/themify-icons.css">
        <!-- owl-carousel -->
        <link rel="stylesheet" type="text/css" href="/theme/css/owl.carousel.css">
        <!-- Video-min -->
        <link rel="stylesheet" type="text/css" href="/theme/css/video.min.css">
        <!-- animate.css -->
        <link rel="stylesheet" type="text/css" href="/theme/css/animate.css">
        <!-- REVOLUTION STYLE SHEETS -->
        <link rel="stylesheet" type="text/css" href="/lib/rev-slider/css/settings.css">
        <!-- REVOLUTION LAYERS STYLES -->
        <link rel="stylesheet" type="text/css" href="/lib/rev-slider/css/layers.css">
        <!-- REVOLUTION NAVIGATION STYLES -->
        <link rel="stylesheet" type="text/css" href="/lib/rev-slider/css/navigation.css">
        <!-- menu style -->
        <link rel="stylesheet" type="text/css" href="/theme/css/menu.css">
        <!-- style -->
        <link rel="stylesheet" type="text/css" href="/theme/css/style.css">
        <!-- responsive.css -->
        <link rel="stylesheet" type="text/css" href="/theme/css/responsive.css">
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        
        
        

        @if (setting('site.google_analytics_tracking_id'))
        Google Analytics (gtag.js) 
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('site.google_analytics_tracking_id') }}"></script>
        <script>
window.dataLayer = window.dataLayer || [];
function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', '{{ setting('site.google_analytics_tracking_id') }}');
        </script>
        @endif
        @if (setting('admin.google_recaptcha_site_key'))
        <script src='https://www.google.com/recaptcha/api.js' async defer></script>
        <script>
function setFormId(formId) {
    window.formId = formId;
}

function onSubmit(token) {
    document.getElementById(window.formId).submit();
}
        </script>
        @endif
    </head>
    <!-- /end of head -->

    <body>
        

        


       