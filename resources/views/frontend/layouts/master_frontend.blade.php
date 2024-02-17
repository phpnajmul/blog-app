<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ url('./assets/easy_logo.png') }}" type="image/x-icon">
    <title>Easy Fashion Ltd.</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<!--Navigation Start-->
@include('frontend.layouts.navbar')
<!--Navigation END-->

@yield('content')

<!--Footer Section Start-->
@include('frontend.layouts.footer')
<!--Footer Section END-->


</body>
</html>
