@extends('adminlte::page')

@section('title', 'Update Project')

@section('content_header')

@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="font-weight-bold border-bottom pb-3 pt-3">Add New Project</h2>
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

    <form action="{{ route('project.update', $realestate->id) }}" method="POST" enctype="multipart/form-data" id="myForm" >
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Title</strong>
                    <input type="text" name="title" class="form-control mt-2" placeholder="Title" value="{{ $realestate->title }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 ">
                <div class="form-group">
                    <strong>Project Type</strong>
                    <select name="project_type" id="project_type" class="form-control mt-2">
                        <option value="Residential Projects" {{ $realestate->project_type == 'Residential Projects'?'selected':''}} >Residential Projects</option>
                        <option value="Commercial Projects" {{ $realestate->project_type == 'Commercial Projects'?'selected':''}} >Commercial Projects</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Type</strong>
                    <input type="text" name="type" class="form-control mt-2" placeholder="EX. 3.5 iBHK" value="{{ $realestate->type }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 ">
                <div class="form-group">
                    <strong>Status</strong>
                    <select name="status" id="status" class="form-control mt-2">
                        <option value="Ongoing" {{ $realestate->status == 'Ongoing'?'selected':''}} >Ongoing Projects</option>
                        <option value="Completed" {{ $realestate->status == 'Completed'?'selected':''}} >Completed Projects</option>
                        <option value="Upcoming" {{ $realestate->status == 'Upcoming'?'selected':''}} >Upcoming Projects</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Location</strong>
                    <input type="text" name="location" class="form-control mt-2" placeholder="EX. Near XXX Location" value="{{ $realestate->location }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            <strong>Description</strong>
                        </div>
                        <div class="card-body">
                            <textarea id="description" class="blog-desc" name="description">{{ $realestate->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Amenities</strong>
                    <select name="amenities[]" id="amenities" placeholder="Select Amenities" class="form-control multi-select" multiple>
                        <option value="" disabled>Select Amenities</option>
                        <option {{in_array('Open Space', explode(', ', $realestate->amenities))?'selected':''}} value="Open Space">Open Space</option>
                        <option {{in_array('Indoor game Room', explode(', ', $realestate->amenities))?'selected':''}} value="Indoor game Room">Indoor game Room</option>
                        <option {{in_array('Children`s Play Area', explode(', ', $realestate->amenities))?'selected':''}} value="Children`s Play Area">Children`s Play Area</option>
                        <option {{in_array('Amphitheatre', explode(', ', $realestate->amenities))?'selected':''}} value="Amphitheatre">Amphitheatre</option>
                        <option {{in_array('Skating Ring', explode(', ', $realestate->amenities))?'selected':''}} value="Skating Ring">Skating Ring</option>
                        <option {{in_array('Banquet Hall', explode(', ', $realestate->amenities))?'selected':''}} value="Banquet Hall">Banquet Hall</option>
                        <option {{in_array('Garden', explode(', ', $realestate->amenities))?'selected':''}} value="Garden">Garden</option>
                        <option {{in_array('Parking', explode(', ', $realestate->amenities))?'selected':''}} value="Parking">Parking</option>
                        <option {{in_array('Swimming pools', explode(', ', $realestate->amenities))?'selected':''}} value="Swimming pools">Swimming pools</option>
                        <option {{in_array('Clubhouse', explode(', ', $realestate->amenities))?'selected':''}} value="Clubhouse">Clubhouse</option>
                        <option {{in_array('Party room', explode(', ', $realestate->amenities))?'selected':''}} value="Party room">Party room</option>
                        <option {{in_array('Balcony', explode(', ', $realestate->amenities))?'selected':''}} value="Balcony">Balcony</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12  mt-2 card">
                <div class="layout card-body">
                    <strong>Layout</strong><br>
                    <a href="javascript:;" id="add_layout" class=""><strong>+ Add Layout</strong></a>
                    <div class="form-group lyt">
                        @if(isset($realestate->layout) && !empty($realestate->layout))
                            @php $lyt = json_decode($realestate->layout); @endphp
                            @foreach($lyt AS $l)
                                <div class="new_layout card"> <div class="row card-body" > <div class="col-xs-12 col-sm-4 col-md-4"> <div class="form-group"> <strong>Layout Image:</strong> <input type="file" name="layout_image[]" class="form-control" > <img src="{{ asset('storage/uploads/' . $l->image) }}" width="50"> </div> </div> <div class="col-xs-12 col-sm-4 col-md-4"> <div class="form-group"> <strong>Layout Title</strong> <input type="text" name="layout_title[]" class="form-control" placeholder="Title" value="{{$l->Title}}" required> </div> </div> <div class="col-xs-12 col-sm-4 col-md-4"> <div class="form-group"> <strong>Layout Type</strong> <select name="layout_type[]" class="form-control" required> <option value="Layout Plan" {{ $l->Type == 'Layout Plan'?'selected':''}}>Layout Plan</option> <option value="Unit Plan" {{ $l->Type == 'Unit Plan'?'selected':''}}>Unit Plan</option> <option value="Cluster Plan" {{ $l->Type == 'Cluster Plan'?'selected':''}}>Cluster Plan</option> </select> </div> </div> </div> </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="layout-remove"><a href="javascript:;"  class="remove-layout"><strong>- Remove Layout</strong></a></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12" title="Add comma separated specification">
                <div class="form-group">
                    <strong title="Add comma separated specification">Specification</strong>
                    <textarea class="form-control" style="height:150px" name="specificaion" placeholder="AAC Block with Shear Walls,  Vitrified Tile Flooring,  3 - Phase Electrical Supply,  Main Door with Standard Safety Locks" >{{ $realestate->specification }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12  mt-2 card">
                <div class="layout card-body">
                    <strong>Surrounding Section Title</strong>
                    @if(!empty($realestate->surrounding))
                        @php
                            $srnd = json_decode($realestate->surrounding);
                        @endphp
                    @endif
                    <input type="text" name="surroundin_title" class="form-control mt-2" placeholder="EX. Viewtifully Connected" value="{{ isset($srnd->title)?$srnd->title:'' }}">

                    <strong>Surrounding Section Description</strong>
                    <textarea class="form-control" style="height:150px" name="surroundin_description" >{{ isset($srnd->description)?$srnd->description:'' }}</textarea>

                    <a href="javascript:;" id="add_location" class=""><strong>+ Add Location</strong></a>
                    <div class="form-group lctn">
                        @if(isset($srnd->location))
                            @foreach($srnd->location AS $val)
                                <div class="new_lctn card"> <div class="row card-body" > <div class="col-xs-8 col-sm-8 col-md-8"> <div class="form-group"> <strong>Location name</strong> <input type="type" name="location_name[]" value="{{$val->name}}" class="form-control" placeholder="Location Name" required> </div> </div> <div class="col-xs-4 col-sm-4 col-md-4"> <div class="form-group"> <strong>Duration</strong> <input type="type" name="location_duration[]" value="{{$val->duration}}" placeholder="5 Mins" class="form-control" required> </div> </div> </div> </div>
                            @endforeach

                        @endif
                    </div>
                    <div class="location-remove"><a href="javascript:;"  class="remove-location"><strong>- Remove Layout</strong></a></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Video Iframe</strong>
                    <textarea class="form-control" name="video_iframe">{{ $realestate->video_iframe }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Map Iframe</strong>
                    <textarea class="form-control" name="map_iframe">{{ $realestate->map_iframe }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Feature Image</strong>
                    <input type="file" name="feature_image" class="form-control" >
                    <img src="{{ asset('storage/uploads/' . $realestate->feature_image) }}" width="50" class="mt-2">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Banner Image</strong>
                    <input type="file" name="banner_images" class="form-control">
                    @if(!empty($realestate->banner_images))
                        <img src="{{ asset('storage/uploads/' . $realestate->banner_images) }}" width="50" class="mt-2">
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Gallery</strong>
                    <input type="file" name="gallery[]" class="form-control" multiple>
                    @if(!empty($realestate->gallery))
                        @php
                        $glr = explode(', ', $realestate->gallery);
                        @endphp
                        @foreach($glr AS $g)
                            <img src="{{ asset('storage/uploads/' . $g) }}" width="50" class="mt-2">
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </div>
        </div>

    </form>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{--    <script src="{{ asset('node_modules/tinymce/tinymce.min.js') }}"></script>--}}
    <script src="https://cdn.tiny.cloud/1/r9fqtfs34xc7rgtb3qv0akebtmizyxkss0wsl59bvdbiev09/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
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

        $(document).ready(function (){
            // Layout
            let template = '<div class="new_layout card"> <div class="row card-body" > <div class="col-xs-12 col-sm-4 col-md-4"> <div class="form-group"> <strong>Layout Image:</strong> <input type="file" name="layout_image[]" class="form-control" required> </div> </div> <div class="col-xs-12 col-sm-4 col-md-4"> <div class="form-group"> <strong>Layout Title</strong> <input type="text" name="layout_title[]" class="form-control" placeholder="Title" required> </div> </div> <div class="col-xs-12 col-sm-4 col-md-4"> <div class="form-group"> <strong>Layout Type</strong> <select name="layout_type[]" class="form-control" required> <option value="Layout Plan">Layout Plan</option> <option value="Unit Plan">Unit Plan</option> <option value="Cluster Plan">Cluster Plan</option> </select> </div> </div> </div> </div>';

            $("#add_layout").on("click", ()=>{
                $(".lyt").append(template);
            })
            $("body").on("click", ".layout-remove", ()=>{
                $('.new_layout:last').remove();
            })

            // Surrounding
            let srnd = '<div class="new_lctn card"> <div class="row card-body" > <div class="col-xs-8 col-sm-8 col-md-8"> <div class="form-group"> <strong>Location name</strong> <input type="type" name="location_name[]" class="form-control" placeholder="Location Name" required> </div> </div> <div class="col-xs-4 col-sm-4 col-md-4"> <div class="form-group"> <strong>Duration</strong> <input type="type" name="location_duration[]" placeholder="5 Mins" class="form-control" required> </div> </div> </div> </div>';

            $("#add_location").on("click", ()=>{
                $(".lctn").append(srnd);
            })
            $("body").on("click", ".location-remove", ()=>{
                $('.new_lctn:last').remove();
            })
        })
    </script>
@stop



