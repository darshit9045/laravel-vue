@extends('adminlte::page')

@section('title', 'Theme')

@section('content_header')

@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Theme Layout</h2>
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

    <form action="{{ route('setting.theme.store') }}" method="POST" id="settingForm">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-2">
                <div class="form-group">
                    <div class="card">
                        <img src="{{asset('/images/theme-1.png')}}" class="card-img-top" height="120">

                        <div class="card-footer">
                            <strong>Layout 1:</strong>
                            <input type="radio" name="theme" class="" value="1" {{get_setting('theme') == '1'?'checked':''}} >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-2">
                <div class="form-group">
                    <div class="card">
                        <img src="{{asset('/images/theme-2.png')}}" class="card-img-top" height="120">

                        <div class="card-footer">
                            <strong>Layout 2:</strong>
                            <input type="radio" name="theme" class="" value="2" {{get_setting('theme') == '2'?'checked':''}} >
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="col-xs-12 col-sm-12 col-md-4">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Layout 2:</strong>--}}
{{--                    <input type="radio" name="theme" class="" value="2" {{get_setting('theme') == '2'?'checked':''}} >--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>


@stop
