@extends('adminlte::page')

@section('title', 'Custom JS')

@section('content_header')

@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="font-weight-bold  pb-3 pt-3">Custom JS</h2>
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

    <form action="{{ route('setting.js.update') }}" method="POST" id="settingForm">
        @csrf
        <div class="row">
            <div class="card w-100">
                <div class="card-body">
                    <strong>Header JS</strong>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group  d-flex bg-light p-3 mt-2">
                            <strong>Status:</strong>
                            <div class="custom-control custom-switch ml-1">
                                <input type="checkbox" class="custom-control-input mt-2" name="header_js_status" value="1" id="customSwitch1"  @if(!empty($header_js)) {{$header_js->status==1?'checked':''}} @endif>
                                <label class="custom-control-label" for="customSwitch1"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Header JS:</strong>
                            <textarea class="form-control mt-2" name="header_js" rows="7" placeholder="<script> ... </script>" >@if(!empty($header_js)) {{$header_js->value}} @endif</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card w-100">
                <div class="card-body">
                    <strong>Footer JS</strong>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group d-flex bg-light p-3 mt-2">
                            <strong>Status:</strong>
                            <div class="custom-control custom-switch ml-1">
                                <input type="checkbox" class="custom-control-input mt-2" name="footer_js_status" value="1" id="customSwitch2"  @if(!empty($footer_js)) {{$footer_js->status==1?'checked':''}} @endif>
                                <label class="custom-control-label" for="customSwitch2"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>footer JS:</strong>
                            <textarea class="form-control mt-2" name="footer_js" rows="7" placeholder="<script> ... </script>" >@if(!empty($footer_js)) {{$footer_js->value}} @endif</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary mb-4">Submit</button>
        </div>
    </form>

@stop
