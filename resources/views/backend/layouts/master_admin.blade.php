<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->

    @include('backend.layouts.navbar')

    <div class="container flex justify-between mx-auto gap-2 py-2 items-center">
        <div class="w-1/4 min-h-screen left-start">
            @include('backend.layouts.sidebar')
        </div>

        <div class="w-3/4 bg-gray-100 pt-4 p-10">
            @yield('content')
        </div>

    </div>



    @include('backend.layouts.footer')



<script>
    function myBtn() {
        var element = document.getElementById("toggle-menu");
        element.classList.toggle("hidden");
    }
</script>

</body>
</html>
