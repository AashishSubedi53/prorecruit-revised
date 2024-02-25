@extends('layouts.users.app')
@section('title')
  Gallery  
@endsection

@section('content')

@if($message = Session::get('success'))
<div class="p-5 ease-in duration-300" id="success-message">
  <div class="mb-4 mt-10 p-5 inline-flex overflow-hidden w-full bg-white rounded-lg shadow-md">
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
</div>

<script>
    // Hide success message after 5 seconds (5000 milliseconds)
    setTimeout(function() {
        document.getElementById('success-message').style.display = 'none';
    }, 5000);
</script>
@endif


<div class="p-5 flex flex-row space-x-10">
  <div class="flex flex-col space-y-2 w-1/2">
  <div>
    <h1 class="text-2xl font-semibold">Gallery Image</h1>
  </div> 
  <!-- <form action="{{route('professional.gallery.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex items-center justify-center w-full">
        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
            </div>
            <input id="dropzone-file" type="file" name="images[]" class="ml-2 rounded-md hidden" multiple>
        </label>
    </div>
  

    <div class="mt-2">
      <button class="bg-rose-500 text-white py-2 px-4 rounded-md">Reset</button>
      <button class="bg-blue-500 text-white py-2 px-4 rounded-md">Submit</button>
    </div>
  </form> -->

  <div x-data="{ fileCount: 0 }">
    <form action="{{ route('professional.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex items-center justify-center w-full">
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>
                <input id="dropzone-file" x-on:change="fileCount = $event.target.files.length" type="file" name="images[]" class="ml-2 rounded-md hidden" multiple>
            </label>
        </div>

        <!-- Display number of selected files -->
        <div class="mt-2 bg-gray-200 p-2 rounded-md">
            <span x-text="fileCount + (fileCount === 1 ? ' image selected' : ' images selected')"
            class="text-gray-500"
            ></span>
        </div>

        <div class="mt-2">
            <button type="button" x-on:click="resetForm()" class="bg-rose-500 text-white py-2 px-4 rounded-md">Reset</button>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Upload</button>
        </div>
    </form>

    <script>
        // Alpine.js script
        function resetForm() {
            const fileInput = document.getElementById('dropzone-file');
            fileInput.value = null; // Reset the file input
            Alpine.store('fileCount', 0); // Reset the file count
            window.location.reload(); // Reload the page
        }
    </script>
</div>


  </div>

  <div class="p-5">  
    <div class="grid grid-cols-2 gap-4">
        @foreach ($galleries as $gallery)          
            <div class="relative">
                @if (auth()->user()->professional->id === $gallery->professional_id)            
                    <img class="h-auto max-w-full rounded-lg" src="{{asset('storage/' . $gallery->url)}}" alt="">
                    <div class="absolute top-2 right-5 p-4">
                        <form action="{{route('professional.gallery.destroy', $gallery->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            @if ($gallery->url)
                                <button class="bg-red-500 text-white px-4 py-2 rounded-lg ml-2">Delete</button>
                            @endif
                        </form>
                    </div>
                @endif      
            </div>        
        @endforeach
    </div>
</div>

</div>
  
@endsection