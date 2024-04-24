@extends('layouts.users.app')
@section('title')
Profile Settings
@endsection

@section('content')

<section class="flex space-x-10 p-10 justify-center mt-10 mb-10">
  <div id="left" class="bg-slate-100 p-10 rounded-md w-1/3">
    <div class="w-20 h-20">
      <img src="{{asset('storage/' . auth()->user()->customer->profile_image ?? 'build/assets/images/default-profile.png')}}" alt="" class="h-full w-full rounded-full">
    </div>

    <div class="mt-5">
      <a href="{{route('customer.my-profile.edit', auth()->user()->id)}}" class="bg-rose-500 text-white py-2 px-4 rounded-lg">
        Edit Details
      </a>
    </div>

    <div id="customer-info" class="flex mt-5 space-x-20">

      <div class="space-y-5">
        <div>
          <label for="first_name" class="text-gray-500 text-xl font-semibold">First Name</label>
          <p id="first_name" class="font-semibold">{{auth()->user()->customer->first_name}}</p>
        </div>

        <div>
          <label for="username" class="text-gray-500 text-xl font-semibold">Username</label>
          <p id="username" class="font-semibold">{{auth()->user()->username}}</p>
        </div>

        <div>
          <label for="phonenumber" class="text-gray-500 text-xl font-semibold">Phonenumber</label>
          <p id="phonenumber" class="font-semibold">{{auth()->user()->customer->phonenumber}}</p>    
        </div>  

      </div>

      <div class="space-y-5">
        <div>
          <label for="last_name" class="text-gray-500 text-xl font-semibold">Last Name</label>
          <p id="last_name" class="font-semibold">{{auth()->user()->customer->last_name}}</p>
        </div>

        <div>
          <label for="address" class="text-gray-500 text-xl font-semibold">Address</label>
          <p id="address" class="font-semibold">{{auth()->user()->customer->address}}</p>
        </div>

        <div>
          <label for="email" class="text-gray-500 text-xl font-semibold">Email</label>
          <p id="email" class="font-semibold">{{auth()->user()->email}}</p>
        </div>

      </div>

    </div>

  </div>

  <div id="right" class="bg-slate-100 p-10 rounded-md w-1/3">
    <h3 class="text-2xl font-semibold">Change Password</h3>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
          @csrf
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
                  >{{ __('Password changed!') }}</p>
              @endif
          </div>
      </form>
  </div>
</section>
  
@endsection