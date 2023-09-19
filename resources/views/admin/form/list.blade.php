@extends('adminlte::page')

@section('title', 'Contact List')
@section('content_header')
    <h1 class="font-weight-bold pb-3 pt-3">Contact List</h1>
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

    <div class="">
        <table class="table table-border table-hover">
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Body</th>
            </tr>
            @php $i = 1; @endphp
            @forelse ($contacts as $cnt)

                <tr>
                    <td class="col-1">{{$i++}}</td>
                    <td class="col-2">{{ $cnt->title }}</td>
                    <td class="col-9">
                        <div class="row">
                        @php $data = json_decode($cnt->message); @endphp
                        @foreach($data->msg AS $key => $dt)
                            @if($key == '_token' || $key == 'Submit') @continue @endif
                            <span class="col-12 col-sm-12 col-md-6 col-lg-6"><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> @if(is_array($dt)) {{implode(', ',$dt)}} @else {{$dt}} @endif </span>
                        @endforeach
                        @foreach($data->attachment AS $key => $val)
                            @if($key == '_token') @continue @endif
                            <span class="col-12 col-sm-12 col-md-6 col-lg-6"><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> <a href="{{asset('images/form/'.$val)}}" target="_blank">{{asset('images/form/'.$val)}}</a> </span>
                        @endforeach
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No record found! </td>
                </tr>
            @endforelse

        </table>
        <div class="pagination ">
            {!! $contacts->links('pagination::bootstrap-5') !!}
        </div>

    </div>

@stop
