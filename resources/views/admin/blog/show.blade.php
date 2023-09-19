@extends('adminlte::page')

@section('title', $blog->title.' | Blogs')

@section('content_header')
    <h1>Blogs <a class="btn btn-info btn-sm" href="{{ route('blog.create') }}">Add Blog</a></h1>
@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="title">{{$blog->title}}</h2>
        <img src="{{asset('images/'.$blog->feature_image)}}" alt="{{$blog->slug}}" class="img-fluid">
        @php $categories = get_cat($blog->categories); @endphp
        <h5 class="font-weight-bold">
        @forelse($categories AS $cat)
            <span class="label text-info pr-3">{{$cat->name}}</span>
        @empty
        @endforelse
        </h5>
        {!! $blog->description !!}
        @php $tags = get_tag($blog->tags); @endphp
        <h6 class="font-weight-bold">
            @forelse($tags AS $tag)
                <span class="label text-info pr-3">#{{$tag->name}}</span>
            @empty
            @endforelse
        </h6>
    </div>

@stop
