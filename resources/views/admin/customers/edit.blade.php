<x-app-layout>
  <x-slot name="header">
       Edit Customers
  </x-slot>

  <div class="mt-5 mb-5">
    <a href="{{route('admin.customers.index')}}" class="bg-rose-700 text-white py-2 px-4 rounded-md">Go Back</a>
  </div>

  @if ($message = Session::get('success'))
    <div class="mb-4 inline-flex overflow-hidden w-full bg-white rounded-lg shadow-md">
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
    </div> @endif

    <form class="max-w-lg mb-5" action="{{route('admin.customers.update', $customer->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <input type="hidden" name="user_type" value="customer">
      
      <div class="mb-5">
        <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
        <input type="text" id="firstname" name="first_name" value="{{$customer->first_name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name">
        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
      </div>
      <div class="mb-5">
        <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
        <input type="text" id="lastname" name="last_name" value="{{$customer->last_name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Last Name">
        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
      </div>
    
      <div class="mb-5">
        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
        <input type="text" id="address" name="address" value="{{$customer->address}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Address">
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
      </div>
      <div class="mb-5">
        <label for="phonenumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
        <input type="text" id="phonenumber" name="phonenumber" value="{{$customer->phonenumber}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Phone Number">
        <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" />
      </div>

      <!-- profile image -->
      <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Profile Image</label>
            @if($customer->profile_image)
                <img src="{{ asset('storage/' . $customer->profile_image) }}" alt="Current Profile Image" class="mb-2 rounded-lg">
            @else
                <p>No profile image available</p>
            @endif
        </div>

        <!-- Upload New Profile Image -->
        <div class="mb-5">
            <label for="profile_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload New Profile Image</label>
            <input type="file" id="profile_image" name="profile_image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar">
            <x-input-error :messages="$errors->get('profile_image')" class="mt-2" />
        </div>
    <div class="mb-5">      
        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
        <input type="text" id="username" name="username" value="{{$customer->user->username}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username">
        <x-input-error :messages="$errors->get('username')" class="mt-2" />
    </div>
    <div class="mb-5">      
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
        <input type="email" id="email" name="email" value="{{$customer->user->email}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@mail.com">
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

    </div>
    <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
        <input type="password" id="password" name="password" value="{{$customer->user->password}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="password">
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>
    <button type="submit" class="bg-blue-700 text-white text-center w-full mx-auto py-2 rounded-lg">Update</button>
  </form>
</x-app-layout>