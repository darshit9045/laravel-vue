@extends('adminlte::page')

@section('title', 'Add Image')

@section('content_header')
    <h1 class="font-weight-bold border-bottom pb-3 d-flex align-items-center justify-content-between">Gellery <a class="btn btn-info btn-sm" href="{{ route('gallery.create') }}"><i class="fa fa-plus pr-1" aria-hidden="true"></i>Add Image</a></h1>
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

    @if ($message = Session::get('success'))
        <div class="alert alert-info btn-sm" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="">

        <div class="card">
            <div class="card-body">
                <form action="{{ route('gallery.upload') }}" method="POST" enctype="multipart/form-data" id="myForm">
                @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Images:</strong>
                                <input type="file" name="image[]" class="form-control h-75 mt-2" multiple >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <form method="post" action="{{route('gallery.search')}}">
            <div class="row pb-2">
                @csrf
                <div class="col-sm-12 col-md-6"><p class="text font-italic">Shortcode: <code><span>@</span>gallery()</code> </p></div>
                <div class="col-sm-12 col-md-4">
                    <input type="text" name="search" value="{{isset($search)?$search:''}}" placeholder="Search" class="form-control">
                </div>
                <div class="col-sm-12 col-md-2">
                    <input type="submit" name="submit" value="Search" class="btn-primary btn">
                </div>
            </div>
        </form>

        <div class="row justify-content-between">
            @forelse ($images as $img)

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <div class="card-header"><b class="card-title">{{$img->name}}</b></div>
                        <div class="card-body">
                            <img src="{{ asset('images/gallery/'.$img->image) }}" alt="{{$img->alt}}" title="{{$img->title}}" height="100">
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div class="shortcode">
                                <code><span>@</span>image({{$img->id}})</code>
                            </div>
                            <div class="d-flex">
                                <a class="btn btn-primary mr-2" href="{{ route('gallery.edit',$img->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('gallery.destroy',$img->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Ary you sure')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                    <p><strong>No record found!</strong></p>
            @endforelse
        </div>

        <div class="pagination pb-5">
            {!! $images->links('pagination::bootstrap-5') !!}
        </div>
    </div>

@stop
