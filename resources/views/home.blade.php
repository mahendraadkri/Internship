<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>Welcome, {{$name ?? "Guest"}}</h1>
     
    {{--<h3>{{date('d-m-y')}}</h3>
    <h2>{{$demo}}</h2> 
    <h2>{!!$demo!!}</h2> --}}
    @if ($name != "")
        {{"Name is not empty"}}

        @else
        {{"Name is empty"}}
    @endif
</body>
</html>