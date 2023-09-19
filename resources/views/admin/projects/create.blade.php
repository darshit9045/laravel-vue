@extends('adminlte::page')

@section('title', 'Projects')

@section('content_header')
    <h1 class="font-weight-bold border-bottom pb-3 d-flex align-items-center justify-content-between">Projects</h1>
@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-info btn-sm" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
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


    <form action="{{ route('projects.store') }}" method="POST" id="myForm" enctype="multipart/form-data" onsubmit="return submitForm()" class="card card-body">
	@csrf

	<div class="row">
	    <div class="col-xs-12 col-sm-12 col-md-12">
	        <div class="form-group">
	            <strong>Name:</strong>
	            <input type="text" name="name" class="form-control mt-2" placeholder="Name" value="{{ old('name') }}">
	        </div>
	    </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <div class="card">
                    <div class="card-header">
                        <strong>Description</strong>
                    </div>
                    <div class="card-body">
                        <textarea id="description" class="project_description" name="description">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Project Images:</strong>
                <input type="file" name="image" class="form-control h-75 mt-2" value="{{ old('image') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Select Category:</strong>
                <select name="category_id" id="category" placeholder="Select Category" class="form-control">
                    <option value="" disabled>Select Category</option>
                    @forelse($category AS $cat)
                        <option value="{{$cat->id}}" >{{$cat->name}}</option>
                    @empty
                        <option value="" disabled>Category is not available!</option>
                    @endforelse
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Select Page:</strong>
                <select name="page_id" id="page" placeholder="Select Page" class="form-control">
                    <option value="" disabled>Select Page</option>
                    @forelse($page AS $val)
                        <option value="{{$val->id}}" >{{$val->name}}</option>
                    @empty
                        <option value="" disabled>Pages is not available!</option>
                    @endforelse
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Select Project status:</strong>
                <select name="project_status" id="project_status" placeholder="Select Project status" class="form-control">
                    <option value="" disabled>Select Project Status</option>
                    <option value="ongoing">Ongoing Projects</option>
                    <option value="completed">Completed Projects</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Select status:</strong>
                <select name="status" id="status" placeholder="Select status" class="form-control">
                    <option value="" disabled>Select Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Type:</strong>
                <input type="text" name="type" class="form-control mt-2" placeholder="Type" value="{{ old('type') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Location:</strong>
                <input type="text" name="location" class="form-control mt-2" placeholder="Location" value="{{ old('location') }}">
            </div>
        </div>
	    <div class="col-xs-12 col-sm-12 col-md-12 mt-3 mb-3">
	        <button type="submit" class="btn btn-primary">Submit</button>
	    </div>
	</div>
    </form>
    <script src="https://cdn.tiny.cloud/1/r9fqtfs34xc7rgtb3qv0akebtmizyxkss0wsl59bvdbiev09/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '.project_description',
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

