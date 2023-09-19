@php
$footer_js = get_setting('footer_js');
$isCookie = get_setting('gdpr');
@endphp
@if(!empty($footer_js))
    @if(strpos($footer_js, "<script") !== false)
        {!! $footer_js !!}
    @else
        <script> {!! $footer_js !!} </script>
    @endif
@endif
@php show_popup(); @endphp
@if(!empty($isCookie))
    <div class="cookie-popup">
        <p>{!! $isCookie !!}</p>
        <button class="btn btn-primary" id="accept-cookies">Accept</button>
    </div>
@endif
