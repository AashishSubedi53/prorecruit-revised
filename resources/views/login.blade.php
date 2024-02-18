@extends('layouts.users.app')

@section('title')
  Login
@endsection

@section('content')
<section class="grid grid-cols-2 gap-5 mx-20 my-10">
  <div class="ml-40">
    <img src="{{asset('build/assets/images/cleaning.png')}}" alt="image" height="400px" width="400px">
  </div>

  <div>

  <form class="max-w-sm mx-auto mb-5 mr-40" method="POST" action="{{route('login')}}">
    @csrf
    <div class="mb-5">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@mail.com" required>
    </div>
    <div class="mb-5">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
      <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="password" required>
    </div>

    <div class="flex flex-row justify-between">
      <div class="flex items-start mb-5">
        <div class="flex items-center h-5">
          <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
        </div>
        <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
      </div>

      <div>
        <a href="" class="text-blue-400">Forgot Password?</a>
      </div>
    </div>
    <button type="submit" class="bg-blue-700 text-white text-center w-full mx-auto py-2 rounded-lg mb-5">Login</button>

    <div class="max-w-sm mx-auto text-center mb-5">
      <p class="mb-5">---------OR---------</p>
      <p>By clicking continue with Google, you agree to the <span class="text-blue-500">Terms of Use</span> and <span class="text-blue-500">Privacy Policy</span></p>
    </div>

    <div class="max-w-sm mx-auto border border-gray-500 rounded-lg">
      <a href=""><img class="" src="{{asset('build/assets/logo/continue-with-google.png')}}" alt=""></a>
    </div>
  </form>


  </div>
</section>
<!-- <section class="grid grid-cols-2 gap-5 mx-20 my-10">
  <div class="ml-40">
    <img src="{{asset('build/assets/images/cleaning.png')}}" alt="image" height="400px" width="400px">
  </div>

  <div>

  <form class="max-w-sm mx-auto mb-5 mr-40" method="POST" action="{{route('login')}}">
    @csrf
    <div class="mb-5">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@mail.com" required>
    </div>
    <div class="mb-5">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
      <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="password" required>
    </div>

    <div class="flex flex-row justify-between">
      <div class="flex items-start mb-5">
        <div class="flex items-center h-5">
          <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
        </div>
        <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
      </div>

      <div>
        <a href="" class="text-blue-400">Forgot Password?</a>
      </div>
    </div>
    <button type="submit" class="bg-blue-700 text-white text-center w-full mx-auto py-2 rounded-lg mb-5">Login</button>

    <div class="max-w-sm mx-auto text-center mb-5">
      <p class="mb-5">---------OR---------</p>
      <p>By clicking continue with Google, you agree to the <span class="text-blue-500">Terms of Use</span> and <span class="text-blue-500">Privacy Policy</span></p>
    </div>

    <div class="max-w-sm mx-auto border border-gray-500 rounded-lg">
      <a href=""><img class="" src="{{asset('build/assets/logo/continue-with-google.png')}}" alt=""></a>
    </div>
  </form>


  </div>
</section> -->
@endsection