@extends('layouts.frontend.realestate.app')
@section('content')

    <div class="realestate-page-container">
        @php
        $compiledContent = \Illuminate\Support\Facades\Blade::compileString($page->body);
        // Use eval() to execute the compiled content and get the rendered output
        $renderedContent = eval("?>$compiledContent<?php");
        // Output the rendered content
        echo $renderedContent;

        @endphp
    </div>

@endsection
