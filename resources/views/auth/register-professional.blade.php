@extends('layouts.users.app')
@section('title')
  Signup as Professional
@endsection


@section('content')
<section class="grid grid-cols-2 gap-5 mx-20 my-10">
  <div class="ml-40">
    <img src="{{asset('build/assets/images/cleaning.png')}}" alt="image" height="400px" width="400px">
  </div>

  <div>

  <form class="max-w-sm mx-auto mb-5 mr-40" action="{{route('register')}}" method="POST">
    @csrf
    <input type="hidden" name="user_type" value="professional">

    <div class="flex space-x-5 mb-5">
      <div class="">
        <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
        <input type="firstname" id="firstname" name="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name" required>
        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
      </div>
      <div class="">
        <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
        <input type="lastname" id="lastname" name="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Last Name" required>
        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
      </div>
    </div>


      <div class="mb-5">
        <label for="businessname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Business Name</label>
        <input type="businessname" id="businessname" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Address" required>
        <x-input-error :messages="$errors->get('username')" class="mt-2" />
      </div>
      <div class="mb-5">
        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
        <input type="address" id="address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Address" required>
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
      </div>
      <div class="mb-5">
        <label for="phonenumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
        <input type="phonenumber" id="phonenumber" name="phonenumber" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Phone Number" required>
        <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" />
      </div>

      <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
        <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@mail.com" required>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
      <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="password" required>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>
      <div class="mb-5">
        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="password" required>
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>
     
      <div class="flex flex-row justify-between">
      <div class="flex items-start mb-5">
        <div class="flex items-center h-5">
          <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
        </div>
        <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Accept terms and conditions</label>
      </div>
    </div>
    <button type="submit" class="bg-blue-700 text-white text-center w-full mx-auto py-2 rounded-lg">Signup</button>
    <a href="{{route('login')}}" class="mt-4 text-sm text-gray-600 underline hover:text-gray-900">Already Registered?</a>
  </form>
  </div>
</section>
@endsection