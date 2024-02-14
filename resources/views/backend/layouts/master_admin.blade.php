<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <title>Easy Fashion Ltd.</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

@include('backend.layouts.body.header')

<div class="container flex justify-between mx-auto gap-2 py-2 items-center">
    <div class="w-1/4 min-h-screen py-1">
        <div>
            @include('backend.layouts.body.sidebar')
        </div>
    </div>

    <div class="w-3/4 min-h-screen pl-2 py-1">
        @yield('content')
    </div>
</div>


@include('backend.layouts.body.footer')

<script>
    function myBtn() {
        var element = document.getElementById("toggle-menu");
        element.classList.toggle("hidden");
    }
</script>

<script>
    @if(Session::has('message'))
        toastr.options = {
        "progressBar" : true,
        "closeButton" : true,
    }
    let type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}",'Success!');
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}",'Warning!');
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}",'Failed!');
            break;
    }
    @endif
</script>

</body>
</html>
