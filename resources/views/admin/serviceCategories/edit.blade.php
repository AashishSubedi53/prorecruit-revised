<x-app-layout>
  <x-slot name="header">
       Edit Service Categories
  </x-slot>

    <form class="max-w-lg mb-5 mt-10" action="{{route('admin.serviceCategories.update', $serviceCategory->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
      <div class="mb-5">
        <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
        <input type="text" id="category_name" name="category_name" value="{{$serviceCategory->category_name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name">
        <x-input-error :messages="$errors->get('category_name')" class="mt-2" />
      </div>
      

      <!--image -->
      <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Service Category Image</label>
            @if($serviceCategory->image)
            <div class="h-20 w-20">
              <img src="{{ asset('storage/' . $serviceCategory->image) }}" alt="Current Service Category Image" class="mb-2 rounded-lg h-full w-full">
            </div>
            @else
                <p>No Service Category image available</p>
        </div>
        @endif

        <!-- Upload New Profile Image -->
        <div class="mb-5">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload New Service Category Image</label>
            <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar">
            @if(!$serviceCategory->image)
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
            @endif
        </div>

    
    <button type="submit" class="bg-blue-700 text-white text-center w-full mx-auto py-2 rounded-lg">Create</button>
  </form>
</x-app-layout>