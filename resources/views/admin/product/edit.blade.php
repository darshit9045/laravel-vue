@extends('adminlte::page')

@section('title', 'Update Product')

@section('content_header')

@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="font-weight-bold border-bottom pb-3 pt-3">Add New Product</h2>
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

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" id="myForm" >
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control mt-2" placeholder="Title" value="{{ $product->title }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Short Title:</strong>
                    <input type="text" name="short_title" class="form-control mt-2" placeholder="Short Title" value="{{ $product->short_title }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 pt-2">
                <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            <strong>Short Description</strong>
                        </div>
                        <div class="card-body">
                            <textarea id="short_description" class="blog-desc" name="short_description">{{ $product->short_description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            <strong>Description</strong>
                        </div>
                        <div class="card-body">
                            <textarea id="description" class="blog-desc" name="description">{{ $product->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" class="form-control mt-2" placeholder="price" value="{{ $product->price }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Purchase URL:</strong>
                    <input type="text" name="purchase_url" class="form-control mt-2" placeholder="Short Title" value="{{ $product->purchase_url }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Product Image:</strong>
                    <input type="file" name="product_image" class="form-control h-75 mt-2" >
                </div>
                <img src="{{ asset('/images/products/'.$product->product_image) }}" width="100" class="pt-2">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Product Gallery:</strong>
                    <input type="file" name="product_gallery[]" class="form-control h-75 mt-2" multiple="multiple">
                    @if (!empty($product->product_gallery))
                        @foreach(explode(', ', $product->product_gallery) as $img)
                            <img src="{{ asset('/images/products/'.$img) }}" width="100" class="p-2">
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group input-area" id="divKeywords">
                    <strong>Meta Keyword:</strong>
                    <input type="text" name="meta_keyword_inpt" id="txtInput" class="form-control mt-2" placeholder="Meta Keyword" value="{{ $product->keyword}}">
                    <input type="hidden" name="keyword" id="meta_keyword_val" value="{{ $product->keyword}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>SEO Title:</strong>
                    <input type="text" name="seo_title" class="form-control mt-2" placeholder="Meta Title" value="{{ $product->seo_title }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Meta Description</strong>
                    <textarea class="form-control mt-2" style="height:150px" name="meta_description" placeholder="Meta Description" >{{ $product->meta_description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
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



