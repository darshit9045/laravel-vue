@extends('adminlte::page')

@section('title', 'Add New Slider')

@section('content_header')
@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Slider</h2>
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

    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data" id="myForm" onsubmit="return submitForm()">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Type:</strong>
                    <select name="type" class="form-control">
                        <option value="" selected disabled>Select slider type</option>
                        <option value="Animate" {{ old('type')=='Animate'?'selected':'' }} >Animate</option>
{{--                        <option value="Autoplay" {{ old('type')=='Autoplay'?'selected':'' }} >Autoplay</option>--}}
                        <option value="Basic" {{ old('type')=='Basic'?'selected':'' }} >Basic</option>
                        <option value="RealEstate" {{ old('type')=='RealEstate'?'selected':'' }} >RealEstate</option>
{{--                        <option value="Center" {{ old('type')=='Center'?'selected':'' }} >Center</option>--}}
{{--                        <option value="Mousewheel" {{ old('type')=='Mousewheel'?'selected':'' }} >Mousewheel</option>shehbaz.adorncommerce+laravel@gmail.com--}}
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Shortcode</strong>
                    <input type="text" name="value" class="form-control" placeholder="Shortcode" value="{{ old('value') }}">
                </div>
            </div>
        </div>
        <div class="slides" id="slides">
            <div class="row">
                <div class="col-xs-10 col-sm-10 col-md-2">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="file" name="image[]" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-10 col-sm-10 col-md-8">
                    <div class="form-group">
                        <div class="card">
                            <div class="card-header">
                                <strong>Text:</strong>
                            </div>
                            <div class="card-body">
                                <textarea class="text" name="text[]">{{old('text[0]')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button id="add_row" type="button" class="btn btn-info mb-2 pr-2">Add Slides</button>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <script src="{{ asset('/js/jquery.min.js') }}"></script>

    <script src="https://cdn.tiny.cloud/1/r9fqtfs34xc7rgtb3qv0akebtmizyxkss0wsl59bvdbiev09/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        function text_editor() {
            tinymce.init({
                selector: '.text',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount code image',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | code | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat | styleselect',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                mergetags_list: [
                    {value: 'First.Name', title: 'First Name'},
                    {value: 'Email', title: 'Email'},
                ]
            });
        }
        text_editor();

        $(document).ready(function (){
            let template = '<div class="row new_row" > <div class="col-xs-12 col-sm-12 col-md-2"> <div class="form-group"> <strong>Image:</strong> <input type="file" name="image[]" class="form-control" required> </div> </div> <div class="col-xs-10 col-sm-10 col-md-8"> <div class="form-group"> <div class="card"> <div class="card-header"> <strong>Text:</strong> </div> <div class="card-body"> <textarea class="text" name="text[]"></textarea> </div> </div> </div> </div> <div class="col-xs-2 col-sm-2 col-md-2"> <span class="btn btn-sm btn-danger btn-close remove">X</span></div> </div>';

            $("#add_row").on("click", ()=>{
                $("#slides").append(template);
                text_editor();
            })
            $("body").on("click", ".remove", ()=>{
                $('.new_row:last').remove();
            })
        })
    </script>
@stop



