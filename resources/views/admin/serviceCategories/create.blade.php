<x-app-layout>
  <x-slot name="header">
       Add Service Categories
  </x-slot>

    <form class="max-w-lg mb-5 mt-10" action="{{route('admin.serviceCategories.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="mb-5">
        <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service Category Name</label>
        <input type="text" id="category_name" name="category_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Service Category Name">
        <x-input-error :messages="$errors->get('category_name')" class="mt-2" />
      </div>
      

      <!-- profile image -->
      <div class="mb-5">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service Category Image</label>
        <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar">
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
      </div>
    
    <button type="submit" class="bg-blue-700 text-white text-center w-full mx-auto py-2 rounded-lg">Create</button>
  </form>
</x-app-layout>