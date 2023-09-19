<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.frontend.meta')
    <link href="{{asset('/css/all.min.css') }}" rel="stylesheet" defer>
    <link href="{{asset('/css/bootstrap-5.0.2-dist/css/bootstrap.css')}}" rel="stylesheet" defer>
    <link href="{{asset('/css/custom-style.min.css')}}" rel="stylesheet" defer>
    <script src="{{asset('/js/jquery.min.js')}}" ></script>
    <script src="{{asset('/css/bootstrap-5.0.2-dist/js/bootstrap.min.js')}}" async></script>
    @include('layouts.frontend.custom_header_value')
</head>
<body>
<div id="app">
    @php
        if(get_setting('header_layout')) { $h = get_setting('header_layout'); }else{$h = 'header';}
        if(get_setting('header_content')) { $headerContent = json_decode(get_setting('header_content')); }else{ $headerContent = ''; }
        if(get_setting('footer_layout')) { $f = get_setting('footer_layout'); }else{$f = 'footer';}
        if(get_setting('footer_content')) { $footerContent = json_decode(get_setting('footer_content')); }else{ $footerContent = ''; }
    @endphp
    @include('layouts.frontend.'.$h)
    <main class="">
        <div class="overlay" ></div>
        <div class="loader" style="display:none;"></div>
        @yield('content')
    </main>
    @include('layouts.frontend.'.$f)
    @include('layouts.frontend.custom_footer_value')
    <script src="{{asset('/js/frontend-custom.js')}}" async></script>
</div>

</body>
</html>
