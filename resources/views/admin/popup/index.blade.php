@extends('adminlte::page')

@section('title', 'Popup')

@section('content_header')
    <h1 class="font-weight-bold border-bottom pb-3 d-flex align-items-center justify-content-between">Popup <a class="btn btn-info btn-sm" href="{{ route('popup.create') }}"><i class="fa fa-plus pr-1" aria-hidden="true"></i>Add Popup</a></h1>
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
        <div class="alert alert-danger" >
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="">
        <div class="alert alert-info status" style="display: none;"></div>
        <table class="table table-border table-hover">
            <tr>
                <th>No.</th>
                <th>Image</th>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @php $i=1; @endphp
            @forelse ($popups as $popup)
                <tr>
                    <td>{{$i++}}</td>
                    <td>@if($popup->image) <img src="{{ asset('images/popup/'.$popup->image) }}" height="75">@endif</td>
                    <td>{{ $popup->title }}</td>
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" name="status" onchange="popup_status({{$popup->id}}, {{$popup->status==1?'0':'1'}})" value="1" id="customSwitch{{$popup->id}}" {{ $popup->status=='1'?'checked':'' }} >
                            <label class="custom-control-label" for="customSwitch{{$popup->id}}"></label>
                        </div>
                    </td>
                    <td class="d-flex">
                        <a class="btn btn-primary mr-2" href="{{ route('popup.edit',$popup->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                        <form action="{{ route('popup.destroy',$popup->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Ary you sure')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No record found! </td>
                </tr>
            @endforelse

        </table>
        <div class="pagination ">
            {!! $popups->links('pagination::bootstrap-5') !!}
        </div>

    </div>
    <script>
        function popup_status(id, status) {
            $.ajax({
                type: 'get',
                url: '{{route('popup.status')}}',
                data: {'id':id, 'status':status},
                success:function(result) {
                    $('.status').html(result)
                    $('.status').show('slow')
                    $(".status").delay(3000).fadeOut(500)
                }
            })
        }
    </script>
@stop


