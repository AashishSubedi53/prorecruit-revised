@extends('layouts.users.app')
@section('title')
  Gallery  
@endsection

@section('content')


<div class="p-5">
  <div class="mb-4 mt-10 p-5 inline-flex overflow-hidden w-full bg-white rounded-lg shadow-md">
      <div class="flex justify-center items-center w-12 bg-blue-500">
          <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
              <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
          </svg>
      </div>

      <div class="px-4 py-2 -mx-3">
          <div class="mx-3">
              <span class="font-semibold text-blue-500">Info</span>
              <p class="text-sm font-semibold text-gray-600">Message !!</p>
          </div>
      </div>
  </div>
</div>

<div class="p-5 flex flex-row space-x-10">
  <div class="flex flex-col space-y-2 w-1/2">
  <div>
    <h1 class="text-2xl font-semibold">Gallery Image</h1>
  </div>    
  <div class="flex items-center justify-center w-full">
      <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
          <div class="flex flex-col items-center justify-center pt-5 pb-6">
              <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
              </svg>
              <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
              <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
          </div>
          <input id="dropzone-file" type="file" class="hidden" />
      </label>
  </div> 

    <div>
      <button class="bg-blue-500 text-white py-2 px-4 rounded-md">Reset</button>
      <button class="bg-green-500 text-white py-2 px-4 rounded-md">Submit</button>
    </div>

  </div>

  <div class="p-5">  
      <div class="grid grid-cols-2 gap-4">
        <div class="relative">
          <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
      
          <div class="absolute top-0 right-0 p-2">
              <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
              <button class="bg-red-500 text-white px-4 py-2 rounded ml-2">Delete</button>
          </div>
        </div>

        <div class="relative">
          <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
      
          <div class="absolute top-0 right-0 p-2">
              <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
              <button class="bg-red-500 text-white px-4 py-2 rounded ml-2">Delete</button>
          </div>
        </div>

        <div class="relative">
          <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
      
          <div class="absolute top-0 right-0 p-2">
              <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
              <button class="bg-red-500 text-white px-4 py-2 rounded ml-2">Delete</button>
          </div>
        </div>

        <div class="relative">
          <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
      
          <div class="absolute top-0 right-0 p-2">
              <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
              <button class="bg-red-500 text-white px-4 py-2 rounded ml-2">Delete</button>
          </div>
        </div>

        <div class="relative">
          <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
      
          <div class="absolute top-0 right-0 p-2">
              <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
              <button class="bg-red-500 text-white px-4 py-2 rounded ml-2">Delete</button>
          </div>
        </div>

        <div class="relative">
          <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
      
          <div class="absolute top-0 right-0 p-2">
              <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
              <button class="bg-red-500 text-white px-4 py-2 rounded ml-2">Delete</button>
          </div>
        </div>
        
      </div>


  </div>
</div>
  
@endsection