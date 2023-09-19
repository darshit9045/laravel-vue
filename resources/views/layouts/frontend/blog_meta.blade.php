
<meta http-equiv="X-UA-Compatible" content="ie=edge">
@if(get_setting('site_title'))
    @php $site_title = get_setting('site_title'); @endphp
@else
    $site_title = '';
@endif
@php
    if(get_setting('site_icon')){$site_icon = get_setting('site_icon');}else{$site_icon='';}
    if(get_setting('tagline')){$tagline = get_setting('tagline');}else{$tagline='';}
@endphp
<title>@if($blog->meta_title){{$blog->meta_title}}@else{{$blog->title}} | @endif {{$site_title}}</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="description" content="{{ $blog->meta_description }}" />
<meta name="keywords" content="{{ $blog->meta_key }}" />
<meta name="robots" content="@if(get_setting('search_engine_visibility') == 0) noindex,nofollow @else index,follow @endif" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta property="og:title" content="@if($blog->meta_title){{$blog->meta_title}}{{$blog->title}} | @endif {{$site_title}}" />
<meta property="og:description" content="{{ $blog->meta_description }}" />
<meta property="og:image" content="{{ asset('/images/'.$blog->feature_image) }}" />
<link rel="canonical" href="{{ config('app.url') }}" />
<link rel="icon" href="{{asset('/images/'.$site_icon)}}" />
<link rel="apple-touch-icon" href="{{asset('/images/'.$site_icon)}}" />

<script type="application/ld+json">{"@context": "https://schema.org", "@type": "BlogPosting", "mainEntityOfPage": { "@type": "WebPage", "@id": "{{request()->url()}}" }, "headline": "{{ $blog->title }}", "image": "{{ asset('images/'.$blog->feature_image) }}", "publisher": { "@type": "Organization", "name": "{{$site_icon}}", "logo": { "@type": "ImageObject", "url": "@if(get_setting('header_logo'))) {{ get_setting('header_logo') }} @endif" }}} </script>
