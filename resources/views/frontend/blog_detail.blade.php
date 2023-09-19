@extends('layouts.frontend.app_blog')

@section('content')
    <div aria-label="breadcrumb" class="contact-banner">
        <div class="text-center mt-3" >
            <ol class="breadcrumb d-flex justify-content-center mb-3" style="font-weight:600">
                <li class="breadcrumb-item"> <a href="/" class="text-dark">Home</a> </li>
                <li class="breadcrumb-item"> <a href="{{route('page.blog')}}" class="text-dark">Blog</a> </li>
                <li class="breadcrumb-item" aria-current="page" style="color: #B97C3B;"> {{$blog->title}}</li>
            </ol>
            <h1 class="fw-bold"> {{$blog->title}} </h1>
        </div>
    </div>

    <div class="container mt-5 blog-details">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-date-main">
                    <figure class="mb-4"><img src="{{asset('images/'.$blog->feature_image)}}" alt="{{$blog->slug}}" class="img-fluid"></figure>
                    <div class="date d-flex align-items-center p-2">
                        <img src="{{asset('images/calender.svg')}}">
                        <p class="mb-0">{{date('M d, Y', strtotime($blog->created_at))}}</p>
                    </div>
                </div>

                <section class="pb-4 pt-4">
                    {!! $blog->description !!}
                </section>

<!--                <div class="row pt-4 pb-4">
                    <div class="col-sm-2 col-lg-2 p-0">
                        <img src="{{asset('/images/man.svg')}}">
                    </div>

                    <div class="col-sm-10 col-lg-10">
                        <p class="m-0">Lorem Ipsum is simply dummy <br> text of the printing</p>
                        <p> March 3, 2023 </p>
                    </div>
                </div>-->
                @php $tags = get_tag($blog->tags); @endphp
                <h6 class="fw-bold">
                    @forelse($tags AS $tag)
                        <span class="label  pr-3">#{{$tag->name}}</span>
                    @empty
                    @endforelse
                </h6>
            </div>

            <div class="col-lg-4">

                <div class="card mb-4">
                    <div>
                        <form action="{{route('blog.serach')}}" method="get" id="serachForm">
                            <div class="input-group">
                                <input class="form-control" type="text" name="s" placeholder="search" aria-label="Enter search term..." aria-describedby="button-search">
                                <button type="submit" class="p-0 border-0" title="Submit"><img src="{{asset('images/search.svg')}}" class="w-100 h-100"></button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="pt-3 pb-3 mt-3 mb-3 text-center">Recent Posts</h5>
                    <div class="card-body">
                        @foreach($recent_blogs AS $recent_blog)
                            <div class="row pb-2 pt-2 align-items-center">
                                <div class="col-sm-3 col-lg-3">
                                    <img src="{{asset('images/'.$recent_blog->feature_image)}}" alt="{{$recent_blog->slug}}" class="w-100">
                                </div>
                                <div class="col-sm-9 col-lg-9">
                                    <p class="mb-0"><a href="{{route('blog.detail', $recent_blog->slug)}}" class="fw-bold text-decoration-none d-flex align-items-center">{{$blog->title}}</a></p>
                                    <p> {{date('M d, Y', strtotime($recent_blog->created_at))}} </p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
