@extends('layouts.users.app')
@section('title')
Profile Settings
@endsection

@section('content')

<section class="flex space-x-10 p-10 mt-10 mb-10">
  <div id="left" class="bg-slate-100 p-10 rounded-md w-1/3">
    <form action="{{route('customer.my-profile.update', auth()->user()->customer->user_id)}}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf 
        @method('PATCH')
        <div class="w-20 h-20">
          <img src="{{asset('storage/' . auth()->user()->customer->profile_image ?? 'build/assets/images/default-profile.png')}}" alt="" class="h-full w-full rounded-full">
        </div>
        
        <div>
          <label for="first_name" class="text-gray-500 font-semibold">First Name</label>
          <input class="mt-1 block w-full border border-gray-400 rounded-md" type="text" name="first_name" value="{{auth()->user()->customer->first_name}}">
        </div>

        <div>
          <label for="last_name" class="text-gray-500 font-semibold">Last Name</label>
          <input class="mt-1 block w-full border border-gray-400 rounded-md" type="text" name="last_name" value="{{auth()->user()->customer->last_name}}">
        </div>

        <div>
          <label for="username" class="text-gray-500 font-semibold">Username</label>
          <input class="mt-1 block w-full border border-gray-400 rounded-md" type="text" name="username" value="{{auth()->user()->username}}">
        </div>

        <div>
          <label for="phonenumber" class="text-gray-500 font-semibold">Phonenumber</label>
          <input class="mt-1 block w-full border border-gray-400 rounded-md" type="text" name="phonenumber" value="{{auth()->user()->customer->phonenumber}}">    
        </div>         

        <div>
          <label for="address" class="text-gray-500 font-semibold">Address</label>
          <input class="mt-1 block w-full border border-gray-400 rounded-md" type="text" name="address" value="{{auth()->user()->customer->address}}">
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
        
        <button type="submit" class="bg-blue-700 py-2 px-4 text-white rounded-md">Save</button>
        </form>
  </div>

  <div id="right" class="bg-slate-100 p-10 rounded-md w-1/3">
    <h3 class="text-2xl font-semibold">Change Password</h3>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
          @csrf
          @method('put')

          <div>
              <label for="update_password_current_password" class="text-gray-500 font-semibold"> Current Password </label>
              <input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full border border-gray-400 rounded-md" autocomplete="current-password" />
              <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
          </div>

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
              <button class="bg-blue-600 text-white py-2 px-4 rounded-md">Save</button>

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