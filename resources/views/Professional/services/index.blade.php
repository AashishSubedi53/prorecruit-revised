@extends('layouts.users.app')

@section('title')
  My Services  
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
              <p class="text-sm font-semibold text-gray-600">service added successfully !</p>
          </div>
      </div>
  </div>
</div>
    
   <!-- table --> 
<div class="mt-5 mb-5 p-5">
  <a href="{{route('professional.my-services.create')}}" class="text-white bg-blue-500 p-3 rounded ">Add Services</a>
</div>
<div class="relative overflow-x-auto p-5 mb-10">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Service Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th> 
                <th scope="col" class="px-6 py-3">
                    Price (Rs.)
                </th> 
                <th scope="col" class="px-6 py-3">
                    Time
                </th> 
                <th scope="col" class="px-6 py-3">
                    Description
                </th>                
                <th scope="col" class="px-6 py-3">
                    Action
                </th>

            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    1
                </th>
                <td class="px-6 py-4">
                    'image'
                </td>
                <td class="px-6 py-4">
                    Cleaning
                </td>
                <td class="px-6 py-4">
                    Home
                </td>
                <td class="px-6 py-4">
                    500
                </td>
                <td class="px-6 py-4">
                    1pm-6pm
                </td>
                <td class="px-6 py-4">
                    Description
                </td>                            
                <td>
                  <div class="flex flex-row gap-1 p-2">                    
                    <a href="#" class="text-white bg-blue-700 rounded px-4 p-2">Edit</a>
                    <form action="#" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="text-white bg-rose-700 rounded p-2">Delete</button>
                    </form>
                  </div>
                </td>
            </tr>  
           
        </tbody>
    </table>
</div>
  
@endsection