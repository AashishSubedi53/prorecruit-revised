<x-app-layout>
  <x-slot name="header">
       Edit Services
  </x-slot>

  @if($message = Session::get('success'))
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

    <form class="max-w-lg mb-5 mt-10" action="{{route('admin.services.update', $service->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
      <div class="mb-5">
        <label for="service_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service Name</label>
        <input type="text" id="service_name" name="service_name" value="{{$service->service_name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name">
        <x-input-error :messages="$errors->get('service_name')" class="mt-2" />
      </div>

      <!-- service image -->
      <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Service Image</label>
            @if($service->image)
            <div class="h-20 w-20">
              <img src="{{ asset('storage/' . $service->image) }}" alt="Current Service Category Image" class="mb-2 rounded-lg h-full w-full">
            </div>
            @else
                <p>No Service image available</p>
        </div>
        @endif

        <!-- Upload New Profile Image -->
        <div class="mb-5">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload New Service Image</label>
            <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar">
            @if(!$service->image)
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
            @endif
        </div>

    <div class="mb-5">      
        <label for="service_category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service Category</label>
        <select name="service_category_id">
            <option selected disabled value="Service Category">Service Category</option>
            @foreach ($serviceCategories as $serviceCategory)
              
              <option @if ($serviceCategory->id === $service->service_category_id) selected @endif value="{{ $serviceCategory->id }}">{{ $serviceCategory->category_name }}</option>
               
              <!-- <option value="{{ $serviceCategory->id }}">{{ $serviceCategory->category_name }}</option> -->
            @endforeach
        </select>        
        <x-input-error :messages="$errors->get('service_category')" class="mt-2" />
    </div>
    
    
    <button type="submit" class="bg-blue-700 text-white text-center w-full mx-auto py-2 rounded-lg">Update</button>
  </form>
</x-app-layout>