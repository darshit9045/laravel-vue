@php $custom_css = get_setting('custom_css'); $header_js = get_setting('header_js'); @endphp
@if(!empty($custom_css))

    @if(strpos($custom_css, "<style") !== false)

        @php

            $compiledContent = \Illuminate\Support\Facades\Blade::compileString($custom_css);
            // Use eval() to execute the compiled content and get the rendered output
            $renderedContent = eval("?>$compiledContent<?php");

            echo $renderedContent;

        @endphp
    @else
        <style defer>
        @php

            $compiledContent = \Illuminate\Support\Facades\Blade::compileString($custom_css);
            // Use eval() to execute the compiled content and get the rendered output
            $renderedContent = eval("?>$compiledContent<?php");

            echo $renderedContent;

        @endphp
        </style>
    @endif
@endif

@if(!empty($header_js))
    @if(strpos($header_js, "<script") !== false)
        {!! $header_js !!}
    @else
        <script> {!! $header_js !!} </script>
    @endif
@endif
