@extends('adminlte::page')

@section('title', 'Update Slider')

@section('content_header')
@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Update Slider</h2>
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

    <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data" id="myForm" onsubmit="return submitForm()">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $slider->title }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Type:</strong>
                    <select name="type" class="form-control">
                        <option value="" selected disabled>Select slider type</option>
                        <option value="Animate" {{ $slider->type=='Animate'?'selected':'' }} >Animate</option>
{{--                        <option value="Autoplay" {{ $slider->type=='Autoplay'?'selected':'' }} >Autoplay</option>--}}
                        <option value="Basic" {{ $slider->type=='Basic'?'selected':'' }} >Basic</option>
                        <option value="RealEstate" {{ $slider->type=='RealEstate'?'selected':'' }} >RealEstate</option>
{{--                        <option value="Center" {{ $slider->type=='Center'?'selected':'' }} >Center</option>--}}
{{--                        <option value="Mousewheel" {{ $slider->type=='Mousewheel'?'selected':'' }} >Mousewheel</option>--}}
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Shortcode</strong>
                    <input type="text" name="value" class="form-control" placeholder="Shortcode" value="{{ $slider->value }}">
                </div>
            </div>
        </div>
        <input type="hidden" name="slide_json" value="{{$slider->slides}}">
        <div class="slides" id="slides">
            @php
            $slides = json_decode($slider->slides);
            @endphp
            @foreach($slides AS $key => $sld)
                <div class="row">
                    <div class="col-xs-10 col-sm-10 col-md-2">
                        <div class="form-group">
                            <strong>Use preview Image:</strong>
                            <input type="checkbox" name="old_image[]" class="is_preview" value="{{$sld->img}}" data-id="{{$key}}" checked>
                            <input type="file" name="image[]" class="form-control d-none upload-{{$key}}" >
                            <br /> <strong>Preview Image:</strong><br />
                            <img src="{{asset('images/sliders/'.$sld->img)}}" class="mt-2" height="75">
                        </div>
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-8">
                        <div class="form-group">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Text:</strong>
                                </div>
                                <div class="card-body">
                                    <textarea class="text" name="text[]">{{$sld->text}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <button id="add_row" type="button" class="btn btn-info mb-2 pr-2">Add Slides</button>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
{{--    <script src="{{ asset('node_modules/tinymce/tinymce.min.js') }}"></script>--}}
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
            $('.is_preview').on('click', function (){
                if($(this).prop('checked')){
                    $('.upload-'+$(this).attr('data-id')).addClass('d-none')
                    $('.upload-'+$(this).attr('data-id')).attr('required', false)
                    $('.upload-'+$(this).attr('data-id')).val('')
                } else {
                    $('.upload-'+$(this).attr('data-id')).removeClass('d-none')
                    $('.upload-'+$(this).attr('data-id')).attr('required', true)
                }
            });

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
