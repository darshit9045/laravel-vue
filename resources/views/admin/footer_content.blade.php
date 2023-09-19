 @extends('adminlte::page')

@section('title', 'Footer Setting')

@section('content_header')

@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="font-weight-bold border-bottom pb-3">Footer</h2>
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

    @php
        if (get_setting('footer_content')) {
            $hc = json_decode(get_setting('footer_content'));
        } else {
            $hc = false;
        }
    @endphp

    <form action="{{ route('setting.footercontent.store') }}" method="POST" id="settingForm">
        @csrf
        <div class="row ml-2">
            <div class="column col-md-3 shadow-sm bg-light p-3 mt-3 mb-3 mr-4 column-prev">
                <strong>Created menu list:</strong>
                @foreach($menus AS $mn)
                    @if($hc && in_array($mn->id, $hc->menu)) @continue @endif
                    <div class="box mt-2" draggable="true">{{$mn->title}}<input type="hidden" name="menu_order_prev[]" value="{{$mn->id}}" ></div>
                @endforeach
            </div>
            <div class="column col-md-3 shadow-sm bg-light p-3 mt-3 mb-3 column-result">
                <div class="form-group">
                    <strong>Drop here footer menu:</strong>
                    <div class="input-group mb-2">
                        <div class="column ">
                            @foreach($menus AS $mn)
                                @if($hc && in_array($mn->id, $hc->menu))
                                    <div class="box mt-2" draggable="true">{{$mn->title}}<input type="hidden" name="menu_order[]" value="{{$mn->id}}" ></div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">

                <div class="card">
                    <div class="card-header">
                        <strong>Address:</strong>
                    </div>
                    <div class="card-body">
                        <textarea id="address" class="text-area" name="address">{!!  $hc?$hc->address:''  !!}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">

                <div class="card">
                    <div class="card-header">
                        <strong>Copyright:</strong>
                    </div>
                    <div class="card-body">
                        <textarea id="copyright" class="text-area" name="copyright">{!!  $hc?$hc->copyright:''  !!}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-12 col-md-6">
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </div>
    </form>
{{--    <script src="{{ asset('node_modules/tinymce/tinymce.min.js') }}"></script>--}}

    <script src="https://cdn.tiny.cloud/1/r9fqtfs34xc7rgtb3qv0akebtmizyxkss0wsl59bvdbiev09/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
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
