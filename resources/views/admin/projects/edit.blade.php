@extends('adminlte::page')

@section('title', 'Update category')

@section('content_header')

@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Update category</h2>
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

    <form action="{{ route('projects.update', $projects->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $projects->name }}">
                    <input type="hidden" name="id" value="{{ $projects->id }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            <strong>Description</strong>
                        </div>
                        <div class="card-body">
                            <textarea id="description" class="project_description" name="description">{{ $projects->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Project Images:</strong>
                    <input type="file" name="image" class="form-control h-75 mt-2" value="{{ $projects->image }}">
                    <img src="{{ '/images/projects/' . $projects->image }}" alt="" height="100" width="100">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Select Category:</strong>
                    <select name="category_id" id="category" placeholder="Select Category" class="form-control">
                        <option value="" disabled>Select Category</option>
                        @forelse($category AS $cat)
                            <option <?php echo ($projects->category_id == $cat->id)?'selected':'';?> value="{{$cat->id}}" >{{$cat->name}}</option>
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
                            <option <?php echo ($projects->page_id == $val->id)?'selected':'';?> value="{{$val->id}}" >{{$val->name}}</option>
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
                        <option <?php echo ($projects->project_status == "ongoing")?'selected':'';?> value="ongoing">Ongoing Projects</option>
                        <option <?php echo ($projects->project_status == "completed")?'selected':'';?> value="completed">Completed Projects</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Select status:</strong>
                    <select name="status" id="status" placeholder="Select status" class="form-control">
                        <option value="" disabled>Select Status</option>
                        <option <?php echo ($projects->status == "active")?'selected':'';?> value="active">Active</option>
                        <option <?php echo ($projects->status == "inactive")?'selected':'';?> value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Type:</strong>
                    <input type="text" name="type" class="form-control mt-2" placeholder="Type" value="{{ $projects->type }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Location:</strong>
                    <input type="text" name="location" class="form-control mt-2" placeholder="Location" value="{{ $projects->location }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3 mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
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
