@extends('adminlte::page')

@section('title', 'Create Form')

@section('content_header')

@stop

@section('content')
    @include('layouts.admin.app')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="font-weight-bold pb-3 pt-3">Create Form</h2>
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
@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <strong>Whoops!</strong> {{ $message }}
    </div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-info btn-sm" role="alert">
    <p>{{ $message }}</p>
</div>
@endif

<div class="card card-body w-50">
    <div class="col-10 col-md-12">
        <div class=""><p class="text font-italic">Add Shortcode: <code><span>@</span>contact_form()</code> </p></div>
        <select class="form-control" name="add_filds" id="add_filds">
{{--            <option value="" selected disabled>Add form filds</option>--}}
            <option value="Checkbox">Checkbox</option>
            <option value="Email">Email</option>
            <option value="File">File</option>
            <option value="Number">Number</option>
            <option value="Radio">Radio</option>
            <option value="Select">Select</option>
            <option value="Tel">Tel</option>
            <option value="text">text</option>
            <option value="textarea">textarea</option>
        </select>
    </div>
    <div class="col-2 col-md-2"><button class="btn btn-primary mt-2" id="add-fild">Add Fild</button></div>
</div>

<form action="{{ route('form.store') }}" method="POST" id="myForm" >
    @csrf

    <div class="form mt-4 ml-2" id="form-add" >

        @foreach($form_fields AS $key => $ff)
        <div class="row new_row" >
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    <strong>Type:</strong>
                    <input type="text" name="filed[{{$key}}][type]" class="form-control mt-2" value="{{$ff->type}}" required readonly>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    <strong>Label:</strong>
                    <input type="text" name="filed[{{$key}}][label]" class="form-control mt-2" value="{{$ff->label}}" required>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    <strong>Required:</strong>
                    <input type="radio" name="filed[{{$key}}][required]" value="1" {{$ff->required==1?'checked':''}} > Yes
                    <input type="radio" name="filed[{{$key}}][required]" value="0" {{$ff->required==0?'checked':''}}> No
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Custom Attr:</strong>
                    <input type="text" name="filed[{{$key}}][custom_attr]" class="form-control mt-2" value="{{$ff->custom_attr}}" >
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group @if(!in_array($ff->type, ['Checkbox', 'Radio', 'Select'])) d-none @endif">
                    <strong>Options:</strong>
                    <input type="text" name="filed[{{$key}}][options]" class="form-control mt-2" value="{{$ff->options}}" @if(in_array($ff->type, ['Checkbox', 'Radio', 'Select'])) required @endif >
                </div>
            </div>
{{--            <div class="col-xs-2 col-sm-2 col-md-2"><span class="btn btn-sm btn-danger btn-close remove">X</span></div>--}}
        </div>
        @endforeach
    </div>
    <div class="row justify-content-between mr-2 ml-2">
        <div class=""><span class="btn btn-sm btn-danger btn-close remove-form-col">Remove Row</span></div>
        <div class="">
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </div>
    </div>
</form>

@stop
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function (){
        var no = {{count($form_fields)+1}};
        $("#add-fild").on("click", ()=>{
            var lbl = $('#add_filds').val(); var dn = 'd-none'; var rq = '';
            if(['Checkbox', 'Radio', 'Select'].includes(lbl)) { dn = ''; rq = 'required';}
            no++;
            // <div class="col-xs-2 col-sm-2 col-md-2"><span class="btn btn-sm btn-danger btn-close remove">X</span></div>
            let template = '<div class="row new_row" > <div class="col-xs-2 col-sm-2 col-md-2"> <div class="form-group"> <strong>Type:</strong> <input type="text" name="filed['+no+'][type]" class="form-control" value="'+lbl+'" required readonly> </div> </div> <div class="col-xs-2 col-sm-2 col-md-2"> <div class="form-group"> <strong>Label:</strong> <input type="text" name="filed['+no+'][label]" class="form-control" value="" required> </div> </div> <div class="col-xs-2 col-sm-2 col-md-2"> <div class="form-group"> <strong>Required:</strong> <input type="radio" name="filed['+no+'][required]" value="1" > Yes <input type="radio" name="filed['+no+'][required]" value="0" checked> No </div> </div> <div class="col-xs-3 col-sm-3 col-md-3"> <div class="form-group"> <strong>Custom Attr:</strong> <input type="text" name="filed['+no+'][custom_attr]" class="form-control" value="" > </div> </div> <div class="col-xs-3 col-sm-3 col-md-3"> <div class="form-group '+dn+'"> <strong>Options:</strong> <input type="text" name="filed['+no+'][options]" class="form-control value="" '+rq+' > </div> </div>  </div>';
            $("#form-add").append(template);
        })
        $("body").on("click", ".remove-form-col", ()=>{
            $('.new_row:last').remove();
            // console.log($(this).closest('.new_row').html());
        })
    })
</script>
