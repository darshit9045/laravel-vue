@extends('adminlte::page')

@section('title', 'Add New Menu')

@section('content_header')

@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Menu</h2>
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

    <form action="{{ route('menu.store') }}" method="POST" id="myForm" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}" required>
                </div>
            </div>
        </div>
        <div class="menu" id="menu-add">
            <div class="row" >
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name[]" class="form-control" placeholder="Name" value="" required>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Slug/URL:</strong>
                        <input type="text" name="slug[]" class="form-control" placeholder="Slug/URL" value="" required>
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2"></div>
            </div>

        </div>
        <button id="add_row" type="button" class="btn btn-info mb-2 pr-2">Add Menu</button>

        <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>

@stop


{{--
@section('js')
    <script>
        $(document).ready(function (){
            let template = '<div class="row new_row" > <div class="col-xs-4 col-sm-4 col-md-4"> <div class="form-group"> <strong>Name:</strong> <input type="text" name="name[]" class="form-control" placeholder="Name" value="" required> </div> </div> <div class="col-xs-6 col-sm-6 col-md-6"> <div class="form-group"> <strong>Slug/URL:</strong> <input type="text" name="slug[]" class="form-control" placeholder="Slug/URL" value="" required > </div> </div><div class="col-xs-2 col-sm-2 col-md-2"> <span class="btn btn-sm btn-danger btn-close remove">X</span></div></div>';
            $("#add_row").on("click", ()=>{
                $("#menu-add").append(template);
            })
            $("body").on("click", ".remove", ()=>{
                $('.new_row:last').remove();
            })
        })
    </script>
@stop
--}}
