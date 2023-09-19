@extends('adminlte::page')

@section('title', 'GDPR Setting')

@section('content_header')

@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="font-weight-bold border-bottom pb-3 pt-3">GDPR Setting</h2>
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

    <form action="{{ route('setting.gdpr.update') }}" method="POST" id="settingForm">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group d-flex bg-white p-3 mt-2">
                    <strong>Cookies Agreement:</strong>
                    <div class="custom-control custom-switch ml-1">
                        <input type="checkbox" class="custom-control-input" name="status" value="1" id="customSwitch1"  @if(!empty($gdpr)) {{$gdpr->status==1?'checked':''}} @endif>
                        <label class="custom-control-label" for="customSwitch1"></label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cookies Agreement Text:</strong>
                    <textarea class="form-control mt-2" name="gdpr"  placeholder="Text here..." >@if(!empty($gdpr)) {{$gdpr->value}} @endif</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

@stop
