<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.frontend.meta')
    <link href="{{asset('/realestate/css/bootstrap.min.css')}}" rel="stylesheet" defer>
    <link href="{{asset('/realestate/css/style.css')}}" rel="stylesheet" defer>
    <script src="{{asset('/js/jquery.min.js')}}" ></script>
    <script src="{{asset('/realestate/js/bootstrap.min.js')}}" async></script>
    <script src="{{asset('/realestate/js/popper.min.js')}}" async></script>
    @include('layouts.frontend.custom_header_value')
</head>
<body>
{{--<div id="app">--}}
<main class="">
    @php
        if(get_setting('header_layout')) { $h = get_setting('header_layout'); }else{$h = 'header';}
        if(get_setting('header_content')) { $headerContent = json_decode(get_setting('header_content')); }else{ $headerContent = ''; }
        if(get_setting('footer_layout')) { $f = get_setting('footer_layout'); }else{$f = 'footer';}
        if(get_setting('footer_content')) { $footerContent = json_decode(get_setting('footer_content')); }else{ $footerContent = ''; }
    @endphp
    @include('layouts.frontend.realestate.header')

        <div class="overlay" ></div>
        <div class="loader" style="display:none;"></div>
        <div class="main">
            @yield('content')
        </div>

    @include('layouts.frontend.realestate.footer')
    @include('layouts.frontend.custom_footer_value')
    <script src="{{asset('/js/frontend-custom.js')}}" async></script>

</main>
{{--</div>--}}
</body>
</html>
