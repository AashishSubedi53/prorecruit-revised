<x-app-layout>
  <x-slot name="header">
       Edit Service Categories
  </x-slot>
  
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
    </div>
    @endif

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