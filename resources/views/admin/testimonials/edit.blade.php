<x-app-layout>
  <x-slot name="header">
       Edit Testimonial
  </x-slot>

  <div class="mt-5 mb-5">
    <a href="{{route('admin.testimonials.index')}}" class="bg-rose-700 text-white py-2 px-4 rounded-md">Go Back</a>
  </div>

  @if(session('success')) 
    <div class="mb-4 inline-flex overflow-hidden w-full bg-white rounded-lg shadow-md" id="success-message">
        <div class="flex justify-center items-center w-12 bg-blue-500">
            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
            </svg>
        </div>

        <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
                <span class="font-semibold text-blue-500">Info</span>
                <p class="text-sm font-semibold text-gray-600">{{session('success')}}</p>
            </div>
        </div>
    </div>
    @endif

    <script>
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 5000);
    </script>

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
            <div x-data="{ description: '', wordCount:  0 }" class="relative">
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"    
                          x-model="description"
                          @input="wordCount = description.split(' ').filter(Boolean).length"
                          x-ref="description">{{$testimonial->description}}</textarea>
                <div class="absolute bottom-0 right-0 p-2 text-xs text-gray-600" x-text="wordCount + ' / 50 words'" x-cloak></div>
            </div>
            {{-- {{dd($testimonial->description)}} --}}
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