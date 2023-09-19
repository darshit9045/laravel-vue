@extends('adminlte::page')

@section('title', 'Header Config')

@section('content_header')

@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="font-weight-bold pt-3 pb-1">Setting</h2>
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

    @php
    if (get_setting('header_content')) {
        $hc = json_decode(get_setting('header_content'));
    } else {
        $hc = false;
    }
    @endphp

    <form action="{{ route('setting.headercontent.store') }}" method="POST" id="settingForm">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>PromoBar:</strong>
                    <div class="input-group mb-2 mt-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-tag"></i></div>
                        </div>
                        <input type="text" class="form-control" id="promoLine" name="promoLine" value="{{$hc?$hc->PromoLine[0]:''}}" placeholder="Promo Line">
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>FaceBook:</strong>
                    <div class="input-group mb-2 mt-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-facebook"></i></div>
                        </div>
                        <input type="url" class="form-control" id="facebook" name="facebook" value="{{$hc?$hc->Social->facebook:''}}" placeholder="FaceBook URL">
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Instagram:</strong>
                    <div class="input-group mb-2 mt-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-instagram"></i></div>
                        </div>
                        <input type="url" class="form-control" id="instagram" name="instagram" value="{{$hc?$hc->Social->instagram:''}}" placeholder="Instagram URL">
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>WhatsApp:</strong>
                    <div class="input-group mb-2 mt-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-whatsapp"></i></div>
                        </div>
                        <input type="url" class="form-control" id="whatsapp" name="whatsapp" value="{{$hc?$hc->Social->whatsapp:''}}" placeholder="WhatsApp URL">
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Twitter:</strong>
                    <div class="input-group mb-2 mt-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-twitter"></i></div>
                        </div>
                        <input type="url" class="form-control" id="twitter" name="twitter" value="{{$hc?$hc->Social->twitter:''}}" placeholder="Twitter URL">
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Pinterest:</strong>
                    <div class="input-group mb-2 mt-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-pinterest"></i></div>
                        </div>
                        <input type="url" class="form-control" id="pinterest" name="pinterest" value="{{$hc?$hc->Social->pinterest:''}}" placeholder="Pinterest URL">
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>YouTube:</strong>
                    <div class="input-group mb-2 mt-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-youtube"></i></div>
                        </div>
                        <input type="url" class="form-control" id="youtube" name="youtube" value="{{$hc?$hc->Social->youtube:''}}" placeholder="YouTube URL">
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Telegram:</strong>
                    <div class="input-group mb-2 mt-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-telegram"></i></div>
                        </div>
                        <input type="url" class="form-control" id="telegram" name="telegram" value="{{$hc?$hc->Social->telegram:''}}" placeholder="Telegram URL">
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    <div class="input-group mb-2 mt-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-phone"></i></div>
                        </div>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{$hc?$hc->Social->phone:''}}" placeholder="Phone Number">
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Email:</strong>
                    <div class="input-group mb-2 mt-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" value="{{$hc?$hc->Social->email:''}}" placeholder="Email">
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-12 col-md-6">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

@stop
