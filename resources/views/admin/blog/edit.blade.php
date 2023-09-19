@extends('adminlte::page')

@section('title', 'Update Blog')

@section('content_header')

@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Update Blog</h2>
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

    <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data" id="myForm" onsubmit="return submitForm()">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $blog->title }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Slug:</strong>
                    <input type="text" name="slug" class="form-control" placeholder="Slug" value="{{ $blog->slug }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <div class="card">
                        <div class="card-header">
                            <strong>Description</strong>
                        </div>
                        <div class="card-body">
                            <textarea id="description" class="blog-desc" name="description">{{ $blog->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Featured Images:</strong>
                    <input type="file" name="feature_image" class="form-control" value="">
                    <img src="{{ asset('images/'.$blog->feature_image) }}" width="150" class="pt-2">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Select Categories:</strong>
                    <select name="categories[]" id="categories" class="form-control multi-select" multiple>
                        <option value="" disabled>Select Category</option>
                        @php $selectCat = explode(', ', $blog->categories); @endphp
                        @forelse($categories AS $cat)
                            <option value="{{$cat->id}}" @if(in_array($cat->id, $selectCat)) selected @endif >{{$cat->name}}</option>
                        @empty
                            <option value="" disabled>Category is not available!</option>
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Select Tags:</strong>
                    <select name="tags[]" id="tags" class="form-control multi-select" multiple>
                        <option value="" disabled>Select Category</option>
                        @php $selectTag = explode(', ', $blog->tags); @endphp
                        @forelse($tags AS $tag)
                            <option value="{{$tag->id}}" @if(in_array($tag->id, $selectTag)) selected @endif >{{$tag->name}}</option>
                        @empty
                            <option value="" disabled>Tag is not available!</option>
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group input-area" id="divKeywords">
                    <strong>Meta Keyword:</strong>
{{--                    <input type="text" name="meta_key" class="form-control" placeholder="Meta Keyword" value="{{ $blog->meta_key }}">--}}
                    <input type="text" name="meta_keyword_inpt" id="txtInput" class="form-control mt-2" placeholder="Meta Keyword" value="{{ $blog->meta_key }}">
                    <input type="hidden" name="meta_key" id="meta_keyword_val" value="{{ $blog->meta_key }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Meta Title:</strong>
                    <input type="text" name="meta_title" class="form-control" placeholder="Meta Title" value="{{ $blog->meta_title }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Meta Description</strong>
                    <textarea class="form-control" style="height:150px" name="meta_description" placeholder="Meta Description" >{{ $blog->meta_description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{$blog->status == 1?'selected':''}} >Published</option>
                        <option value="2" {{$blog->status == 2?'selected':''}} >Draft</option>
                        <option value="3" {{$blog->status == 3?'selected':''}} >Trash</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
{{--    <script src="{{ asset('node_modules/tinymce/tinymce.min.js') }}"></script>--}}
    <script src="https://cdn.tiny.cloud/1/r9fqtfs34xc7rgtb3qv0akebtmizyxkss0wsl59bvdbiev09/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '.blog-desc',
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

