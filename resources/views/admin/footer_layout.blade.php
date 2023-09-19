@extends('adminlte::page')

@section('title', 'Footer')

@section('content_header')

@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Footer Layout</h2>
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

    <form action="{{ route('setting.footerlayout.store') }}" method="POST" id="settingForm">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Layout 1:</strong>
                    <input type="radio" name="footer_layout" class="" value="footer" {{get_setting('footer_layout') == 'footer'?'checked':''}} >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Layout 2:</strong>
                    <input type="radio" name="footer_layout" class="" value="footer_layout2" {{get_setting('footer_layout') == 'footer_layout2'?'checked':''}} >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Layout 3:</strong>
                    <input type="radio" name="footer_layout" class="" value='footer_layout3' {{get_setting('footer_layout') == 'footer_layout3'?'checked':''}} >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>


@stop


