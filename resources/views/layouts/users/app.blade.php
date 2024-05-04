<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{env('APP_NAME')?? 'Pro-Recruit'}}</title>
  {{-- KHALTI --}}
  <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
  @livewireStyles()
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  {{-- @vite('resources/css/app.css') --}}
  @stack('script')

</head>
<body>
  <header class="bg-blue-700 py-5">
    <div class="container mx-auto">
    @include('layouts.users.header')
    </div>
  </header>



<div id="main" class="">
  @yield('content')
  {{-- {{$slot}} --}}
</div>

<footer class="bg-blue-700 text-white">
  <div class="container mx-auto">
    @include('layouts.users.footer')
  </div>
</footer>
@livewireScripts()
</body>
</html>




