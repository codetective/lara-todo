<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href={{URL::asset('css/bootstrap.min.css')}}>
    <!-- Latest compiled and minified CSS -->
</head>

<body>

    <div class="container">
        @yield('content')
    </div>

    <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>