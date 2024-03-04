@extends('layouts.users.app')
@section('title')
Search Professionals
@endsection

@section('content')
<div class="flex p-8">
    <!-- Left menu -->
    <div class="w-1/4 mr-4 border border-gray-200 rounded-md py-5 px-3">
        <div class="relative w-full mb-5">
            <input type="search" id="search-dropdown" class="block p-2.5 py-4 w-full z-20 text-sm text-gray-900 bg-gray-50 border border-gray-200 rounded-md" placeholder="Search by location..." required />
            <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-700">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </div>
      <h2 class="text-lg font-bold text-gray-700">Select Services</h2>
      <ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white space-y-2 mt-2 w-full">
            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="vue-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="vue-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cleaning</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="react-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="react-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cleaning</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="angular-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="angular-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Web Development</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="laravel-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="laravel-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Plumbing</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="laravel-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="laravel-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Plumbing</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="laravel-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="laravel-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Plumbing</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="laravel-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="laravel-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Plumbing</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="laravel-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="laravel-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Plumbing</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="laravel-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="laravel-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Plumbing</label>
                </div>
            </li>
            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input id="laravel-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="laravel-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Plumbing</label>
                </div>
            </li>
        </ul>
      <button class="bg-blue-600 text-white w-full h-12 rounded-lg mt-4">Apply Now</button>
    </div>
    <!-- Right content -->
    <div class="w-3/4 p-5">
      <h2 class="text-lg font-bold text-gray-700">Professionals</h2>
    <div class="flex bg-white shadow-lg rounded-lg p-4 mt-4 border border-gray-200">
        <div class="h-40 w-40 sm:w-48 md:w-64 lg:w-80 xl:w-96 mr-5">
            <img src="{{asset('storage/' . auth()->user()->customer->profile_image)}}" alt="Profile picture" class="h-full w-full object-cover rounded-lg">
        </div>
        <div class="flex flex-col w-full space-y-3"> 
            <h3 class="text-gray-800 font-semibold">John Plumbing Pvt. Ltd.</h3>
            <div class="flex items-center space-x-5">
              <img src="{{asset('build/assets/icons/location.png')}}" alt="" class="h-5 w-5"> <span class="text-gray-600">Kathmandu</span>
              <img src="{{asset('build/assets/icons/clock.png')}}" alt="" class="h-5 w-5"><span class="text-gray-600">Rs. 2000</span>
            </div>
            <p class="text-gray-600">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
        </div>
        <div class="flex space-x-1">
            <button class="bg-blue-600 text-white w-32 h-10 rounded-lg"><a href="{{route('customer.professional-details.index')}}">View Profile</a></button>
            <button class="bg-green-600 text-white w-32 h-10 rounded-lg">Book Now</button>
        </div>
    </div>

    <div class="flex bg-white shadow-lg rounded-lg p-4 mt-4 border border-gray-200">
        <div class="h-40 w-40 sm:w-48 md:w-64 lg:w-80 xl:w-96 mr-5">
            <img src="{{asset('storage/' . auth()->user()->customer->profile_image)}}" alt="Profile picture" class="h-full w-full object-cover rounded-lg">
        </div>
        <div class="flex flex-col w-full space-y-3"> 
            <h3 class="text-gray-800 font-semibold">John Plumbing Pvt. Ltd.</h3>
            <div class="flex items-center space-x-5"> 
              <img src="{{asset('build/assets/icons/location.png')}}" alt="" class="h-5 w-5"> <span class="text-gray-600">Kathmandu</span>
              <img src="{{asset('build/assets/icons/clock.png')}}" alt="" class="h-5 w-5"><span class="text-gray-600">Rs. 2000</span>
            </div>
            <p class="text-gray-600">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
        </div>
        <div class="flex space-x-1">
            <button class="bg-blue-600 text-white w-32 h-10 rounded-lg">View Profile</button>
            <button class="bg-green-600 text-white w-32 h-10 rounded-lg">Book Now</button>
        </div>
    </div>

    <div class="flex bg-white shadow-lg rounded-lg p-4 mt-4 border border-gray-200">
        <div class="h-40 w-40 sm:w-48 md:w-64 lg:w-80 xl:w-96 mr-5">
            <img src="{{asset('storage/' . auth()->user()->customer->profile_image)}}" alt="Profile picture" class="h-full w-full object-cover rounded-lg">
        </div>
        <div class="flex flex-col w-full space-y-3"> 
            <h3 class="text-gray-800 font-semibold">John Plumbing Pvt. Ltd.</h3>
            <div class="flex items-center space-x-5"> 
              <img src="{{asset('build/assets/icons/location.png')}}" alt="" class="h-5 w-5"> <span class="text-gray-600">Kathmandu</span>
              <img src="{{asset('build/assets/icons/clock.png')}}" alt="" class="h-5 w-5"><span class="text-gray-600">Rs. 2000</span>
            </div>
            <p class="text-gray-600">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
        </div>
        <div class="flex space-x-1">
            <button class="bg-blue-600 text-white w-32 h-10 rounded-lg">View Profile</button>
            <button class="bg-green-600 text-white w-32 h-10 rounded-lg">Book Now</button>
        </div>
    </div>

    <div class="flex bg-white shadow-lg rounded-lg p-4 mt-4 border border-gray-200">
        <div class="h-40 w-40 sm:w-48 md:w-64 lg:w-80 xl:w-96 mr-5">
            <img src="{{asset('storage/' . auth()->user()->customer->profile_image)}}" alt="Profile picture" class="h-full w-full object-cover rounded-lg">
        </div>
        <div class="flex flex-col w-full space-y-3"> 
            <h3 class="text-gray-800 font-semibold">John Plumbing Pvt. Ltd.</h3>
            <div class="flex items-center space-x-5"> 
              <img src="{{asset('build/assets/icons/location.png')}}" alt="" class="h-5 w-5"> <span class="text-gray-600">Kathmandu</span>
              <img src="{{asset('build/assets/icons/clock.png')}}" alt="" class="h-5 w-5"><span class="text-gray-600">Rs. 2000</span>
            </div>
            <p class="text-gray-600">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
        </div>
        <div class="flex space-x-1">
            <button class="bg-blue-600 text-white w-32 h-10 rounded-lg">View Profile</button>
            <button class="bg-green-600 text-white w-32 h-10 rounded-lg">Book Now</button>
        </div>
    </div>

      
    </div>


    
  </div>
@endsection