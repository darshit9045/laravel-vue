<!doctype html>
<html lang="en">
<head>
    <title>Contact Email</title>
</head>
<body>
<h1>New Contact Form Submission</h1>

@forelse($data AS $key => $dt)
    @if($key == '_token' || $key == 'Submit') @continue @endif
    <p><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> @if(is_array($dt)) {{implode(', ',$dt)}} @else {{$dt}} @endif</p>
@empty
    <strong>Data Not Found!</strong>
@endforelse

@foreach($attachment AS $key => $val)
    <p><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> <a href="{{asset('images/form/'.$val)}}" target="_blank">{{asset('images/form/'.$val)}}</a></p>
@endforeach

</body>
</html>
