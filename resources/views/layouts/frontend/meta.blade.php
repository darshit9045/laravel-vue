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
<title>@if($page->meta_title){{$page->meta_title}} | @endif{{$page->name}} | {{$site_title}}</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="description" content="{{ $page->meta_description }}" />
<meta name="keywords" content="{{ $page->meta_keyword }}" />
<meta name="robots" content="@if(get_setting('search_engine_visibility') == 0) noindex,nofollow @else index,follow @endif" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta property="og:title" content="@if($page->meta_title){{$page->meta_title}} | @endif{{$page->name}} | {{$site_title}}" />
<meta property="og:description" content="{{ $page->meta_description }}" />
@if($page->feature_image)
    <meta property="og:image" content="{{ asset('/images/'.($page->feature_image)?$page->feature_image:$site_icon)  }}" />
@endif
<link rel="canonical" href="{{ config('app.url') }}" />
<link rel="icon" href="{{asset('/images/'.$site_icon)}}" />
<link rel="apple-touch-icon" href="{{asset('/images/'.$site_icon)}}" />
<script type="application/ld+json">{"@context": "https://schema.org/", "@type": "WebSite", "name": "{{$site_icon}}", "url": "{{ config('app.url') }}", "description": "{{ $page->meta_description }}", "potentialAction": {"@type": "SearchAction", "target": "{search_term_string}", "query-input": "required name=search_term_string" }, "headline": "{{$tagline}}", "image": {"@type": "ImageObject", "url": "{{ asset('/images/'.($page->feature_image)?$page->feature_image:get_setting('header_logo')) }}" }} </script>
