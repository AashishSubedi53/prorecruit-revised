<x-app-layout>
  <x-slot name="header">
       Add Testimonial
  </x-slot>

    <form class="max-w-lg mb-5 mt-10" action="{{route('admin.testimonials.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="mb-5">
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
            <input type="text" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username">
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- <div class="max-w-full mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Testimonial Description</label>
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Testimonial Description..."></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div> -->
      
        <div class="max-w-full mb-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Testimonial Description</label>
            <div x-data="{ description: '', wordCount:  0 }" class="relative">
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  
                          placeholder="Testimonial Description..."  
                          x-model="description"
                          @input="wordCount = description.split(' ').filter(Boolean).length"
                          x-ref="description"></textarea>
                <div class="absolute bottom-0 right-0 p-2 text-xs text-gray-600" x-text="wordCount + ' / 50 words'" x-cloak></div>
            </div>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>


      <div class="mb-5">
        <label for="user_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User Image</label>
        <input type="file" id="user_image" name="user_image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar">
        <x-input-error :messages="$errors->get('user_image')" class="mt-2" />
      </div>
    
    <button type="submit" class="bg-blue-700 text-white text-center w-full mx-auto py-2 rounded-lg">Create</button>
  </form>
</x-app-layout>