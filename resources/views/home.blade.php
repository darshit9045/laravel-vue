@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@if ($message = Session::get('success'))
<div class="alert alert-danger btn-sm" role="alert">
    <p>{{ $message }}</p>
</div>
@endif

<div class="pt-3 pr-3 pl-3">
   <h1 class="font-weight-bold border-bottom pb-3">Hello Welcom to Admin Dashboard</h1>
</div>


@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box ">
                <span class="info-box-icon bg-info"><i class="far fa-fw fa-file "></i></span>
                <div class="info-box-content ">
                    <span class="info-box-text">Pages</span>
                    <span class="info-box-number">{{$pages}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fa fa-blog "></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Blogs</span>
                    <span class="info-box-number">{{$blogs}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box ">
                <span class="info-box-icon bg-info"><i class="fa fa-envelope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Messages</span>
                    <span class="info-box-number">{{$messages}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box ">
                <span class="info-box-icon bg-info"><i class="fa fa-image"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">media</span>
                    <span class="info-box-number">{{$media}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="content-header">
                <h3 class="text-dark">User Activities</h3>
            </div>
            <table class="table table-bordered bg-light">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Action</th>
                    <th>IP Address</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($user_activities AS $ua)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{ucfirst($ua->activity)}}</td>
                    <td>{{$ua->ip_address}}</td>
                    <td>{{$ua->activity=='login'?$ua->login_time:$ua->logout_time}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="content-header">
                <h3 class="text-dark">Latest Message</h3>
            </div>
            <table class="table table-bordered bg-light">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Details</th>
                </tr>
                </thead>
                <tbody>
                @php $i = 1; @endphp
                @foreach($contacts AS $cnt)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{ $cnt->title }}</td>
                        <td>
                            @php $data = json_decode($cnt->message); @endphp
                            @foreach($data->msg AS $key => $dt)
                                @if($key == '_token' || $key == 'Submit') @continue @endif
                                    @if ($loop->iteration > 3)
                                        @break
                                    @endif
                                <span class="col-12 col-sm-12 col-md-6 col-lg-6"><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> @if(is_array($dt)) {{implode(', ',$dt)}} @else {{$dt}} @endif </span>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="content-header">
                <h3 class="text-dark">Latest Blogs</h3>
            </div>
            <table class="table table-bordered bg-light">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Title</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($last_blogs AS $lb)
                    <tr>
                        <td>{{$i++}}</td>
                        <td><img src="{{ asset('images/'.$lb->feature_image) }}" width="75"></td>
                        <td>{{$lb->title}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-12 col-md-6">


        </div>
    </div>
@endsection
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('/css/admin_custom.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
