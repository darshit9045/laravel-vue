@extends('adminlte::page')

@section('title', 'Trashed Pages')

@section('content_header')
    <h1 class="font-weight-bold border-bottom pb-3 d-flex align-items-center justify-content-between">Trash Pages  <a class="btn btn-info btn-sm" href="{{ route('pages.create') }}"><i class="fa fa-plus pr-1" aria-hidden="true"></i>Add Pages</a></h1>

@stop

@section('content')
    @include('layouts.admin.app')
    <div class="row">
    <div class="col-lg-12 margin-tb">

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

    <div class="">
        @include('layouts.admin.nav-pages')
        <table class="table table-border table-hover">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @forelse ($pages as $page)
                <tr>
                    <td><input type="checkbox" class="page-selectors" name="ids[]" value="{{ $page->id }}"></td>
                    <td>{{ $page->name }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>{{ $page->status}}</td>
                    <td>
                        <form action="{{ route('pages.trashed.destroy',$page->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Ary you sure')" >ForseDelete<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No record found! </td>
                </tr>
            @endforelse
        </table>
        <div class="pagination ">
            {!! $pages->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@stop
