@extends('adminlte::page')

@section('title', 'Update Popup')

@section('content_header')
@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Update Popup</h2>
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

    <form action="{{ route('popup.update', $popup->id) }}" method="POST" enctype="multipart/form-data" id="myForm" onsubmit="return submitForm()">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $popup->title }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" value="">
                    @if($popup->image)
                        <img src="{{ asset('/images/popup/'.$popup->image) }}" height="75" class="mt-2 ">
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea id="description" class="popup-desc form-control" name="description">{{ $popup->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Show In:</strong>
                    <select name="show_in" class="form-control">
                        <option value="" selected disabled>Show In</option>
                        <option value="1" {{ $popup->show_in=='1'?'selected':'' }} >Only Home Page</option>
                        <option value="0" {{ $popup->show_in=='0'?'selected':'' }} >All Page</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Show Once:</strong>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="show_once" value="1" id="customSwitch1" {{ $popup->show_once=='1'?'checked':'' }} >
                        <label class="custom-control-label" for="customSwitch1"></label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="status" value="1" id="customSwitch2" {{ $popup->status=='1'?'checked':'' }} >
                        <label class="custom-control-label" for="customSwitch2"></label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <script src="https://cdn.tiny.cloud/1/r9fqtfs34xc7rgtb3qv0akebtmizyxkss0wsl59bvdbiev09/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        function text_editor() {
            tinymce.init({
                selector: '.popup-desc',
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
    </script>
@stop

