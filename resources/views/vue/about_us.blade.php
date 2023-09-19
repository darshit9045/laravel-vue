<!DOCTYPE html>
{{--{{ dd($page) }}--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
{{--    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>--}}
    <link href="/css/style.css" rel="stylesheet">
    @vite('/public/js/jquery.min.js')
    @vite('/public/css/all.min.css')
    @vite('/public/css/bootstrap-5.0.2-dist/css/bootstrap.css')
{{--    @vite('/public/css/style.css')--}}
</head>
<body>
<div id="app">
</div>
@vite('/public/js/popper.min.js')
@vite('/public/js/bootstrap.min.js')
@vite('/public/js/general.js')
@vite('resources/js/app.js')
</body>
</html>