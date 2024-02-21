<x-app-layout>
  <x-slot name="header">
       Edit Testimonial
  </x-slot>

    <form class="max-w-lg mb-5 mt-10" action="{{route('admin.testimonials.update', $testimonial->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    
        <div class="mb-5">
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
            <input type="text" id="username" name="username" value="{{$testimonial->username}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username">
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <div class="max-w-full mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Testimonial Description</label>
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Testimonial Description...">{{$testimonial->description}}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
      

        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current User Image</label>
            @if($testimonial->user_image)
                <img src="{{ asset('storage/' . $testimonial->user_image) }}" alt="Current Profile Image" class="mb-2 rounded-lg">
            @else
                <p>No user image available</p>
            @endif
        </div>

      <div class="mb-5">
        <label for="user_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload User Image</label>
        <input type="file" id="user_image" name="user_image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar">
        <x-input-error :messages="$errors->get('user_image')" class="mt-2" />
      </div>
    
    <button type="submit" class="bg-blue-700 text-white text-center w-full mx-auto py-2 rounded-lg">Update</button>
  </form>
</x-app-layout>