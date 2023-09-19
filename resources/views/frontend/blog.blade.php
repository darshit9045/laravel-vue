@extends('layouts.frontend.app')
@section('content')
    <div class="blog-banner">
        <div class="text-center mt-3">
            <ol class="breadcrumb d-flex justify-content-center mb-3" style="font-weight: 600;">
                <li class="breadcrumb-item active"><a class="text-dark" href="/">Home</a></li>
                <li class="breadcrumb-item" style="color: #b97c3b;" aria-current="page">Blog</li>
            </ol>
            <h1 style="font-size: 50px; font-weight: bold;">Blog</h1>
        </div>
    </div>
    <div class="page-container">
        <div class="container blog pt-5 pb-5">
            <div class="row">
                @forelse($blogs As $blog)
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img" src="{{asset("images/".$blog->feature_image)}}" alt="{{$blog->slug}}'">
                            <div class="card-body">
                                <div class=" text-dark">
                                    <div class="views text-dark fw-blod pb-4">
                                        <i class="fa fa-sharp fa-regular fa-calendar-week pe-2"></i>
                                        {{date('M d, Y', strtotime($blog->created_at))}}
                                    </div>
                                </div>
                                <h4 class="card-title pb-3 lh-base">{{ $blog->title}} </h4>
                                <p class="card-text fw-blod">
                                    {{Str::limit(strip_tags(htmlspecialchars_decode($blog->description)), 200, '...') }}</p>
                                <a href="{{route('blog.detail', $blog->slug)}}" class="fw-bold text-dark text-decoration-none d-flex align-items-center">
                                    Read More
                                    <i class="fa fa-long-arrow-alt-right ps-2"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-sm-12 col-lg-12 mb-12 mt-5 mb-5">
                        <div class="card border-0 text-center">
                            <h3>No Result Found!</h3>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="pagination pagination-custom justify-content-center">
                {{$blogs->links('pagination::bootstrap-5')}}
            </div>
        </div>
    </div>

@endsection
