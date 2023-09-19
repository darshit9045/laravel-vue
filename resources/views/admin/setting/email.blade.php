@extends('adminlte::page')

@section('title', 'Email Setting')

@section('content_header')

@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="font-weight-bold border-bottom pb-3 pt-3">Email Setting</h2>
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

    <form action="{{ route('setting.email.update') }}" method="POST" id="settingForm">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>MAIL_MAILER:</strong>
                    <input type="text" name="MAIL_MAILER" class="form-control mt-2" placeholder="MAIL_MAILER" value="{{env('MAIL_MAILER')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>MAIL_HOST:</strong>
                    <input type="text" name="MAIL_HOST" class="form-control mt-2" placeholder="MAIL_HOST" value="{{env('MAIL_HOST')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>MAIL_PORT:</strong>
                    <input type="number" name="MAIL_PORT" class="form-control mt-2" placeholder="MAIL_PORT" value="{{env('MAIL_PORT')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>MAIL_USERNAME:</strong>
                    <input type="text" name="MAIL_USERNAME" class="form-control mt-2" placeholder="MAIL_USERNAME" value="{{env('MAIL_USERNAME')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>MAIL_PASSWORD:</strong>
                    <input type="password" name="MAIL_PASSWORD" class="form-control mt-2" placeholder="MAIL_PASSWORD" value="{{env('MAIL_PASSWORD')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>MAIL_ENCRYPTION:</strong>
                    <input type="text" name="MAIL_ENCRYPTION" class="form-control mt-2" placeholder="MAIL_ENCRYPTION" value="{{env('MAIL_ENCRYPTION')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>MAIL_FROM_ADDRESS:</strong>
                    <input type="text" name="MAIL_FROM_ADDRESS" class="form-control mt-2" placeholder="MAIL_FROM_ADDRESS" value="{{env('MAIL_FROM_ADDRESS')}}">
                </div>
            </div>
<!--            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>MAIL_FROM_NAME:</strong>
                    <input type="text" name="MAIL_FROM_NAME" class="form-control" placeholder="MAIL_FROM_NAME" value="{{env('MAIL_FROM_NAME')}}">
                </div>
            </div>-->

            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

@stop
