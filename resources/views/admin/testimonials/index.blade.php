<x-app-layout>
    <x-slot name="header">
        Testimonials
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

    <div class="mt-5 mb-5">
      <a href="{{route('admin.testimonials.create')}}" class="text-white bg-blue-500 p-3 rounded ">Add Testimonial</a>
    </div>

   <!-- table --> 
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Username
                </th> 
                <th scope="col" class="px-6 py-3">
                    User Image
                </th>                
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($testimonials as $testimonial)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$testimonial -> id}}
                </th>
                <td class="px-6 py-4">
                {{$testimonial -> description}}
                </td>
                <td class="px-6 py-4">
                {{$testimonial -> username}}
                </td>
                <td class="px-6 py-4">
                    <div class="w-20 h-20">
                        <img src="{{asset('storage/' . $testimonial -> user_image)}}" alt="user image" class="h-full w-full">
                    </div>
                </td>
                
                <td>
                  <div class="flex flex-row gap-1 p-2">                    
                    <a href="{{route('admin.testimonials.edit', $testimonial->id)}}" class="text-white bg-blue-950 rounded px-4 p-2">Edit</a>
                    <form action="{{route('admin.testimonials.destroy', $testimonial->id)}}" method="POST">
                        @csrf
                        @method('DELETE')                      
                      <button class="text-white bg-rose-700 rounded p-2">Delete</button>
                    </form>
                  </div>
                </td>
            </tr>  
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>