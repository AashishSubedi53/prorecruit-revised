@extends('layouts.users.app')
@push('script')
  @vite('resources/js/flowbite.js')
@endpush
@section('title')
    Login
@endsection

@section('content')

@if($message = Session::get('status'))
    <div class="fixed top-0 pt-4 w-full pointer-events-none" id="success-message">
        <div class="container mx-auto flex justify-end">
            <div class="mb-4 pointer-events-auto p-5 inline-flex overflow-hidden w-full max-w-lg bg-white rounded-lg shadow-md">
                <div class="flex justify-center items-center w-12 bg-blue-500">
                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z">
                        </path>
                    </svg>
                </div>
                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold text-blue-500">Info</span>
                        <p class="text-sm font-semibold text-gray-600">{{$message}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Hide success message after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 5000);
    </script>
    @endif
    
    <section class="grid grid-cols-2 gap-5 mx-20 my-20">
        <div class="ml-40">
            <img src="{{asset('storage/'. $imagePath)}}" alt="image" height="400px" width="400px">
        </div>

        <div>
            

    <form class="max-w-sm mx-auto mb-5" method="POST" action="{{ route('login') }}" class="mt-4">
    @csrf
        <!-- Email Address -->
        <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email"
                     name="email"
                     id="email"
                     value="{{ old('email') }}"
                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                     required
                     autofocus
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-3">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password"
                     name="password"
                     id="password"
                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                     required
                     autocomplete="current-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-between mt-4">
            <!-- Remember Me -->
            <div>
                <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox text-indigo-600" name="remember">
                    <span class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div>
                @if (Route::has('password.request'))
                    <a class="block text-sm fontme text-blue-400 hover:underline"
                       href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                @endif
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-700 text-white text-center w-full mx-auto py-2 rounded-lg mb-5">Login</button>

        </div>

        <div class="max-w-sm mx-auto text-center mb-5">
            <p class="mb-5">---------OR---------</p>
            <p>By clicking continue with Google, you agree to the <span class="text-blue-500">Terms of Use</span> and <span class="text-blue-500">Privacy Policy</span></p>
        </div>

    

    </form>


    
    <div class="max-w-sm mx-auto border border-gray-500 rounded-lg">

    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="w-full flex items-center justify-between px-4 py-2 border border-gray-500 rounded-lg">
        <div class="flex items-center">
            <img class="inline-block" src="{{asset('storage/logo/continue-with-google.png')}}" alt="">
        </div>
        <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="gray" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
    </button>

        <div id="dropdown" class="z-10 hidden bg-gray-100 divide-y shadow-md divide-gray-100 rounded-lg w-1/4 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            <li>
                <a href="{{route('google-auth', ['user_type'=>'customer'])}}" class="block px-4 py-2 font-semibold hover:bg-blue-500 hover:text-white">
                    <input type="hidden" name="user_type" value="customer">
                    Login as Customer
                </a>
            </li>
            </ul>
        </div>
    </div>

    </div>

        

    </section>
    
@endsection

