<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('seo.index')
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/cust-fonts.css">
    <link href="https://site-assets.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/responsive-font.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css">

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />

    {{-- <link rel="stylesheet" type="text/css" href="{{asset('/css/font-fileuploader.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/jquery.fileuploader.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/jquery.fileuploader-theme-dragdrop.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/main.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('/css/main-basic.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/plugins.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/custom2.css')}}">

    {!!$settings->header_code!!}
    @livewireStyles
    @if(auth()->check())
        @php
        if(session('seen_notifications')==null)
            session(['seen_notifications'=>0]);
        $notifications=auth()->user()->notifications()->orderBy('created_at','DESC')->limit(50)->get();
        $unreadNotifications=auth()->user()->unreadNotifications()->count();
        @endphp
    @endif
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <style type="text/css">
        *:not(.fileuploader):not([class^="fileuploader-icon-"]):not([class^="fa"]):not(.cairo):not([class^="vj"]):not([class^="tie-"]) {
            font-family: 'DinNext',sans-serif!important;
            /*direction: rtl;*/
        }
        .navbar-light .navbar-nav .nav-link {
            color: rgba(0,0,0,1);
        }
        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255,255,255,1);
        }
        .fancybox__track{
            direction: ltr;
        }
        body,*{
            direction: rtl;
            text-align: start;
          color:  #000000;

        }
        html{
            font-size: 16px;
        }
        /**:not(.fileuploader):not([class^=fa]):not([class^=vj]):not([class^=tie-]) {
            font-family: dubai, sans-serif;
        }*/
        .start-head {
            height: 20px;
            width: 12px;
            display: inline-block;
            background: #0194fe;
            position: relative;
            top: 5px;
            margin-left: 5px;
        }
        .main-box-stylex{
            box-shadow: 0 8px 16px 0 rgb(10 14 29 / 2%), 0 8px 64px 0 rgb(119 119 119 / 8%);
        }
        .row{
            margin: 0px;
        }
        /*.offcanvas.show:not(.hiding), */.offcanvas.showing{
            transform: translateX(100%);
        }
        .offcanvas.offcanvas-start{
            transform: translateX(100%);
        }
        .offcanvas-backdrop{
            right: 0px;
        }
        @media (max-width: 991.98px){
            .navbar-expand-lg .navbar-collapse .dropdown-toggle:after {
                position: absolute;
                right: 11.75rem;
                top: 0.35rem;
                font-size: .9rem;
            }
        }
        .btn-close:before{
            all: unset;
        }
        .dropdown-toggle:after {
            font-size: 0.85rem;
            margin-right: 0.1rem!important;
        }
        .dropdown-toggle:after{
            margin-right: 0rem!important;
        }
        .navbar-nav .dropdown-menu{
            position: absolute;
        }
        .dropdown-toggle:after {
            margin-right: -0.4rem!important;
        }
        .dropdown-menu[data-bs-popper]{
            top: 120%;
        }
        .nav-link{
            font-weight: normal;
        }
        @media (max-width: 991.98px){
            .navbar-expand-lg .navbar-brand {
                padding: 0px;
            }

        }
        .offcanvas{
            background-color: #ffffff!important;
        }
        .navbar-expand-lg .navbar-collapse .nav-link, .navbar-expand-lg .navbar-collapse .nav-link.active, .navbar-expand-lg .navbar-collapse .nav-link:focus, .navbar-expand-lg .navbar-collapse .nav-link:hover, .navbar-expand-lg .navbar-collapse .show>.nav-link{
            color: #232323!important;
        }
        .offcanvas.offcanvas-end{
            right: -1px!important;
        }


        .bg-light {
            --bs-bg-opacity: 1;
             background-color:unset !important;
        }
        /*.bg-line.red {*/
        /*    background: repeating-linear-gradient(-55deg, rgba(255, 255, 255, 0) 0.8px, #e2626b 1.6px, #e2626b 3px, rgba(255, 255, 255, 0) 3.8px, rgba(255, 255, 255, 0) 10px);*/
        /*}*/

        #myBtn {
            /*display: none;*/
            display: block;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 32px;
            border: none;
            outline: none;
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            padding: 3px 17px;
            border-radius: 44px;
        }

        /*.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {*/
        /*    color: #d1334b;*/
        /*    !*color: #f7ad42;*!*/

        /*}*/

        /*.swiper-container.nav-color .swiper-button, .swiper-container.nav-color .swiper-slide figure .item-link {*/
        /*    background: rgb(247 173 66) !important;*/
        /*    color: #fff !important;*/
        /*}*/
        /*a{*/
        /*    color: rgb(247 173 66) !important;*/
        /*}*/

        .header_footer_bottom {
            font-size: 20px;
            text-align: center;
        }

        .swiper-container.dots-closer .swiper-pagination {
            bottom: 0rem;
        }
    </style>
    @yield('styles')
</head>
<body >
    <style type="text/css">
        #toast-container>div {
            opacity: 1;
        }
    </style>
    @yield('after-body')
    <div id="app">
        {{-- <div class="page-loader"></div> --}}
        <x-navbar />
        <main class="p-0">
            @yield('content')
        </main>
        <x-footer />

            <a  id="myBtn" title="Whats App" href="{{$settings->whatsapp_link}}"><i style="color: white" class="fab fa-whatsapp"></i></a>


    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>

    {{-- <script src="{{asset('/js/jquery.fileuploader.min.js')}}"></script> --}}
    <script src="{{asset('/js/validatorjs.min.js')}}"></script>
    <script src="{{asset('/js/favicon_notification.js')}}"></script>
    <script src="{{asset('/js/main.js')}}"></script>
    <script src="{{asset('/assets/js/plugins.js')}}"></script>
    <script src="{{asset('/assets/js/theme.js')}}"></script>
<script>
    // let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    $('.settings-tab-opener').on('click', function () {
        $('.settings-tab-opener').removeClass('active');
        $(this).addClass('active');
        var open_id = $(this).attr('data-opentab');
        $('.taber').removeClass('active');
        $('.taber#' + open_id).addClass('active');
    });


</script>

    @livewireScripts
    @include('layouts.scripts')
    @yield('scripts')


    {!!$settings->footer_code!!}
</body>
</html>
