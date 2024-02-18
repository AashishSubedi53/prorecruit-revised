<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
  <header class="p-5 bg-blue-700">
    @include('layouts.users.header')
  </header>

<div id="main" class="">
  @yield('content')
</div>

<footer class="bg-blue-700 text-white">
  @include('layouts.users.footer')
</footer>
</body>
</html>




