@extends('layouts.frontend.app')
@section('content')

    <div class="page-container">
        <h1>{{ $page->name}} </h1>
        {!! $page->body !!}
    </div>

@endsection
