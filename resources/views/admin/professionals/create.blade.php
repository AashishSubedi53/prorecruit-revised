<x-app-layout>
  <x-slot name="header">
       Add Professionals
  </x-slot>

    <form class="max-w-lg mb-5 mt-10" action="{{route('admin.professionals.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_type" value="professional">

      <div class="mb-5">
        <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
        <input type="text" id="firstname" name="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name">
        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
      </div>
      <div class="mb-5">
        <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
        <input type="text" id="lastname" name="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Last Name">
        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
      </div>

      <div class="mb-5">      
        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Business Name</label>
        <input type="text" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username">
        <x-input-error :messages="$errors->get('username')" class="mt-2" />
      </div>
      
      <div class="mb-5">
        <label for="address_line_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address Line 1</label>
        <input type="text" id="address_line_1" name="address_line_1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="address_line_1">
        <x-input-error :messages="$errors->get('address_line_1')" class="mt-2" />
      </div>
      <div class="mb-5">
        <label for="address_line_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address Line 2</label>
        <input type="text" id="address_line_2" name="address_line_2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="address_line_2">
        <x-input-error :messages="$errors->get('address_line_2')" class="mt-2" />
      </div>
      <div class="mb-5">      
        <label for="province" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Province</label>
        <select id="province" name="province" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected disabled value="Service Category">Service Province</option>
            <option value="Province 1">Province 1</option>            
            <option value="Madhesh Pradesh">Madhesh Pradesh</option>            
            <option value="Bagmati Province">Bagmati</option>            
            <option value="Gandaki">Gandaki</option>            
            <option value="Lumbini">Lumbini</option>            
            <option value="Karnali">Karnali</option>            
            <option value="Sudurpaschim">Sudurpaschim</option>            
        </select>        
        <x-input-error :messages="$errors->get('service_category')" class="mt-2" />
      </div>
      <div class="mb-5">
        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
        <input type="text" id="city" name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="city">
        <x-input-error :messages="$errors->get('city')" class="mt-2" />
      </div>
      <div class="mb-5">
        <label for="postal_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Postal_code</label>
        <input type="text" id="postal_code" name="postal_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="postal_code">
        <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
      </div>
      <div class="mb-5">
        <label for="phonenumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
        <input type="text" id="phonenumber" name="phonenumber" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Phone Number">
        <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" />
      </div>

      <!-- profile image -->
      <div class="mb-5">
        <label for="profile_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile Image</label>
        <input type="file" id="profile_image" name="profile_image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar">
        <x-input-error :messages="$errors->get('profile_image')" class="mt-2" />
      </div>

    <div class="mb-5">      
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
        <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@mail.com">
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

    </div>
    <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="password">
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>
    <button type="submit" class="bg-blue-700 text-white text-center w-full mx-auto py-2 rounded-lg">Create</button>
  </form>
</x-app-layout>