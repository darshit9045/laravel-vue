@extends('adminlte::page')

@section('title', 'Add New Page')

@section('content_header')

@stop

@section('content')
    @include('layouts.admin.app')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="font-weight-bold border-bottom pb-3">Add New Page</h2>
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

<form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data" id="myForm" onsubmit="return submitForm()">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control mt-2" placeholder="Name" value="{{ old('name') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Slug:</strong>
                <input type="text" name="slug" class="form-control mt-2" placeholder="Slug" value="{{ old('slug') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">

            <div class="card">
               <div class="card-header">
                <strong>Body:</strong>
                </div>
                <div class="card-body">
                   <textarea id="body" name="body">{{ old('body') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Featured_Images:</strong>
                <input type="file" name="feature_image" class="form-control mt-2 h-75" placeholder="Name" value="{{ old('featured_image') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Meta_Title:</strong>
                <input type="text" name="meta_title" class="form-control mt-2" placeholder="Name" value="{{ old('meta_title') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta_Description</strong>
                <textarea class="form-control" style="height:150px" name="meta_description" placeholder="Detail" >{{ old('meta_description') }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group input-area" id="divKeywords">
                <strong>Meta_Keyword:</strong>
                <input type="text" name="meta_keyword_inpt" id="txtInput" class="form-control mt-2" placeholder="Meta_Keyword" value="{{ old('meta_keyword')}}">
                <input type="hidden" name="meta_keyword" id="meta_keyword_val" value="{{ old('meta_keyword')}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">

            <div class="form-group">
                    <strong>Status:</strong>
                    <select name="status" id="status" class="form-control mt-2">
                        <option value="Public">Public</option>
                        <option value="Draft">Draft</option>
                    </select>
                </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-6">
             <div class="form-group">
                 <strong>Theme:</strong>
                 <select name="theme" id="theme" class="form-control mt-2">
                     <option value="1" {{get_setting('theme') == '1'?'selected':''}} >Layout 1</option>
                     <option value="2" {{get_setting('theme') == '2'?'selected':''}} >Layout 2</option>
                 </select>
             </div>
         </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="hidden" name="parent_page" class="form-control mt-2">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <button type="submit" class="btn btn-primary mb-4">Submit</button>
        </div>
    </div>

</form>
{{--<script src="{{ asset('node_modules/tinymce/tinymce.min.js') }}"></script>--}}

<script src="https://cdn.tiny.cloud/1/r9fqtfs34xc7rgtb3qv0akebtmizyxkss0wsl59bvdbiev09/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#body',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount code image',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | code | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat | styleselect',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ]
    });
</script>

@stop
