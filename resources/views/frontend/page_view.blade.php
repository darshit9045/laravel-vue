@extends('layouts.frontend.app')
@section('content')

    <div class="page-container">
{{--        <h1>{{ $page->name}} </h1>--}}

        @php

        $compiledContent = \Illuminate\Support\Facades\Blade::compileString($page->body);
        // Use eval() to execute the compiled content and get the rendered output
        $renderedContent = eval("?>$compiledContent<?php");
        // Output the rendered content
        echo $renderedContent;

        @endphp
    </div>

@endsection
