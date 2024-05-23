@extends('layouts.users.app')
@section('title')
Profile Settings
@endsection

@section('content')
@push('script')
  @vite('resources/js/flowbite.js')
@endpush

@if($message = Session::get('success'))
<div class="p-5 ease-in duration-300 w-1/4" id="success-message">
  <div class="mb-4 mt-10 p-5 inline-flex overflow-hidden w-full bg-white rounded-lg shadow-md">
      <div class="flex justify-center items-center w-12 bg-blue-500">
          <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
              <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
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

<script>
    // Hide success message after 5 seconds (5000 milliseconds)
    setTimeout(function() {
        document.getElementById('success-message').style.display = 'none';
    }, 5000);
</script>
@endif

<section class="flex space-x-10 p-10 mt-10 mb-10 justify-center">
  <div id="left" class="bg-gray-100 p-10 rounded-md w-1/3">
    <form action="{{route('professional.my-profile.update', auth()->user()->professional->user_id)}}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf 
        @method('PATCH')
        <div class="w-20 h-20">
          <img src="{{asset('storage/' . auth()->user()->professional->profile_image ?? 'build/assets/images/default-profile.png')}}" alt="" class="h-full w-full rounded-full">
        </div>
        
        <div>
          <label for="first_name" class="text-gray-500 font-semibold">First Name</label>
          <input class="mt-1 block w-full border border-gray-400 rounded-md" type="text" name="first_name" value="{{auth()->user()->professional->first_name}}">
        </div>

        <div>
          <label for="last_name" class="text-gray-500 font-semibold">Last Name</label>
          <input class="mt-1 block w-full border border-gray-400 rounded-md" type="text" name="last_name" value="{{auth()->user()->professional->last_name}}">
        </div>

        <div>
          <label for="username" class="text-gray-500 font-semibold">Username</label>
          <input class="mt-1 block w-full border border-gray-400 rounded-md" type="text" name="username" value="{{auth()->user()->username}}">
        </div>

        <div>
          <label for="phonenumber" class="text-gray-500 font-semibold">Phonenumber</label>
          <input class="mt-1 block w-full border border-gray-400 rounded-md" type="text" name="phonenumber" value="{{auth()->user()->professional->phonenumber}}">    
        </div>         

        <div>
          <label for="address" class="text-gray-500 font-semibold">Address</label>
          <input class="mt-1 block w-full border border-gray-400 rounded-md" type="text" name="address" value="{{auth()->user()->professional->address->address_line_1}}">
        </div>

        <div>
          <label for="email" class="text-gray-500 font-semibold">Email</label>
          <input class="mt-1 block w-full border border-gray-400 rounded-md" type="text" name="email" value="{{auth()->user()->email}}">
        </div>

        <div class="mb-5">
            <label for="profile_image" class="text-gray-500 font-semibold">Upload New Profile Image</label>
            <input type="file" id="profile_image" name="profile_image" class="block w-full text-sm mt-1 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar">
            <x-input-error :messages="$errors->get('profile_image')" class="mt-2" />
        </div>

        <div>
          <button type="submit" class="bg-blue-700 py-2 px-4 text-white rounded-md">Save</button>
        </div>

      </form>
  </div>

  <div id="right" class="bg-gray-100 p-10 rounded-md w-1/3">
    <h3 class="text-2xl font-semibold">Change Password</h3>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
          @csrf

          @if(auth()->user()->password)
          <div>
              <label for="update_password_current_password" class="text-gray-500 font-semibold"> Current Password </label>
              <input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full border border-gray-400 rounded-md" autocomplete="current-password" />
              <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
          </div>
          @endif

          <div>
              <label for="update_password_password" class="text-gray-500 font-semibold"> New Password </label>
              <input id="update_password_password" name="password" type="password" class="mt-1 block w-full border border-gray-400 rounded-md"" autocomplete="new-password" />
              <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
          </div>

          <div>
              <label for="update_password_password_confirmation" class="text-gray-500 font-semibold"> Confirm Password </label>
              <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full border border-gray-400 rounded-md"" autocomplete="new-password" />
              <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
          </div>

          <div class="flex items-center gap-4">
              <button class="bg-blue-700 text-white py-2 px-4 rounded-md">Save</button>

              @if (session('status') === 'password-updated')
                  <p
                      x-data="{ show: true }"
                      x-show="show"
                      x-transition
                      x-init="setTimeout(() => show = false, 2000)"
                      class="text-sm text-gray-600"
                  >{{ __('Saved.') }}</p>
              @endif
          </div>
      </form>
  </div>
</section>
  
@endsection