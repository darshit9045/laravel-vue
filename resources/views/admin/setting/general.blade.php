@extends('adminlte::page')

@section('title', 'Setting')

@section('content_header')

@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="font-weight-bold border-bottom pb-3">Setting</h2>
            </div>

        </div>
    </div>

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
    @if ($message = Session::get('success'))
        <div class="alert alert-info btn-sm" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data" id="settingForm">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Site Title:</strong>
                    <input type="text" name="site_title" class="form-control mt-2" placeholder="Site Title" value="@if(get_setting('site_title')) {{get_setting('site_title')}} @endif">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Tagline:</strong>
                    <input type="text" name="tagline" class="form-control mt-2" placeholder="Tagline" value="@if(get_setting('tagline')) {{get_setting('tagline')}} @endif">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="admin_email" class="form-control mt-2" placeholder="Admin Email" value="@if(get_setting('admin_email')) {{get_setting('admin_email')}} @endif">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Contact no:</strong>
                    <input type="number" name="admin_contact" class="form-control mt-2" placeholder="Admin Contact" value="@if(get_setting('admin_contact')){{get_setting('admin_contact')}}@endif">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Address:</strong>
                    <input type="text" name="admin_address" class="form-control mt-2" placeholder="Admin Address" value="@if(get_setting('admin_address')){{get_setting('admin_address')}}@endif">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Select Front/Home Page:</strong>
                    <select name="home_page" class="form-control mt-2">
                        <option value="" >Select Front/Home Page</option>
                        @foreach($pages AS $page)
                            <option value="{{$page->id}}" @if($page->id == get_setting('home_page')) selected @endif >{{$page->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Search engine visibility:</strong>
                    <input type="radio" name="search_engine_visibility" class="" value="1" @if(get_setting('search_engine_visibility') == 1 || get_setting('search_engine_visibility') == '') checked @endif > On
                    <input type="radio" name="search_engine_visibility" class="" value="0" @if(get_setting('search_engine_visibility') == 0) checked @endif > Off
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Header Logo:</strong>
                    <input type="file" name="header_logo" class="form-control mt-2 h-75" accept="image/*" >
                    @if(get_setting('header_logo'))
                        <img src="{{ asset('/images/'.get_setting('header_logo')) }}" height="50" class="mt-2">
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Footer Logo:</strong>
                    <input type="file" name="footer_logo" class="form-control mt-2 h-75" accept="image/*">
                    @if(get_setting('footer_logo'))
                        <img src="{{ asset('/images/'.get_setting('footer_logo')) }}" height="50" class="mt-2">
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Site Icon:</strong>
                    <input type="file" name="site_icon" class="form-control mt-2 h-75" accept="image/*">
                    @if(get_setting('site_icon'))
                        <img src="{{ asset('/images/'.get_setting('site_icon')) }}" height="50" class="mt-2">
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary mb-4">Submit</button>
            </div>
        </div>

    </form>

@stop
