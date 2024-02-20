@extends('layouts.users.app')

@section('title')
@auth    
Welcome,&nbsp;<span>{{auth()->user()->username}}</span>

  @if(auth()->user()->user_type==='customer')
  <form class="max-w-md mx-auto mb-5 mt-10" action="{{route('customer.search-professional.index')}}">   
      <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
      <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
          </div>
          <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search professionals based on services..." required />
          <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
      </div>
  </form>
  @endif
@endauth    
  
@endsection

@section('content')

<div class="bg-slate-200">
  <div class="flex justify-center space-x-12 p-10 text-center">
    <div>
      <a href=""><img src="{{asset('build/assets/icons/home.png')}}" alt="home" height="50px" width="50px"></a>
      <p>Home</p>
    </div>
    <div>
      <a href=""><img src="{{asset('build/assets/icons/Health.png')}}" alt="health" height="50px" width="50px"></a>
      <p>Health</p>
    </div>
    <div>
      <a href=""><img src="{{asset('build/assets/icons/events.png')}}" alt="events" height="50px" width="50px"></a>
      <p>Events</p>
    </div>
    <div>
      <a href=""><img src="{{asset('build/assets/icons/business.png')}}" alt="business" height="50px" width="50px"></a>
      <p>Business</p>
    </div>
    <div>
      <a href=""><img src="{{asset('build/assets/icons/design&web.png')}}" alt="design&web" height="50px" width="50px"></a>
      Design&Web
    </div>
    <div>
      <a href=""><img src="{{asset('build/assets/icons/more.png')}}" alt="more" height="50px" width="50px"></a>
      More
    </div>
  </div>
</div>


    <div x-data="{ transform: 0, totalItems: {{ count($homeServices ?? []) }} }">
    <div class="flex items-center justify-center py-24 sm:py-8 px-4">
        <div class="relative flex items-center justify-center w-1/2 h-60 mx-auto">
            <button aria-label="slide backward" class="absolute z-30 left-0 ml-[-25px] mt-20 focus:outline-none cursor-pointer bg-gray-200 p-3 rounded-full"
                @click="transform += 398; transform = (transform > 0) ? -398 * (totalItems - 1) : transform">

                <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
            <h1 class="text-3xl font-semibold">Home</h1>
                <div id="slider"
                    class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700"
                    x-bind:style="'transform: translateX(' + transform + 'px)'">
                    @foreach ($homeServices as $homeService)
                        <div x-data="{ title: '{{ $homeService->service_name }}' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="{{ asset('storage/' . $homeService->image) }}" alt="{{ $homeService->service_name }}" height="200px" width="200px" />
                            <div class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                                <h3 x-text="title" class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900"></h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <button aria-label="slide forward" class="absolute z-30 right-0 mr-[-35px] mt-20 focus:outline-none cursor-pointer bg-gray-200 p-3 rounded-full"
                @click="transform -= 398; transform = (transform < -398 * (totalItems - 1)) ? 0 : transform">
                <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>
</div>



<div x-data="{ transform: 0, totalItems: {{ count($healthServices ?? []) }} }">
    <div class="flex items-center justify-center py-24 sm:py-8 px-4">
        <div class="relative flex items-center justify-center w-1/2 h-60 mx-auto">
            <button aria-label="slide backward" class="absolute z-30 left-0 ml-[-25px] mt-20 focus:outline-none cursor-pointer bg-gray-200 p-3 rounded-full"
                @click="transform += 398; transform = (transform > 0) ? -398 * (totalItems - 1) : transform">

                <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
            <h1 class="text-3xl font-semibold">Health</h1>
                <div id="slider1"
                    class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700"
                    x-bind:style="'transform: translateX(' + transform + 'px)'">
                    @foreach ($healthServices as $healthService)
                        <div x-data="{ title: '{{ $healthService->service_name }}' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="{{ asset('storage/' . $healthService->image) }}" alt="{{ $healthService->service_name }}" height="200px" width="200px" />
                            <div class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                                <h3 x-text="title" class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900"></h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <button aria-label="slide forward" class="absolute z-30 right-0 mr-[-35px] mt-20 focus:outline-none cursor-pointer bg-gray-200 p-3 rounded-full"
                @click="transform -= 398; transform = (transform < -398 * (totalItems - 1)) ? 0 : transform">
                <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>
</div>



<div x-data="{ transform: 0, totalItems: {{ count($webServices ?? []) }} }">
    <div class="flex items-center justify-center py-24 sm:py-8 px-4">
        <div class="relative flex items-center justify-center w-1/2 h-60 mx-auto">
                <button aria-label="slide backward" class="absolute z-30 left-0 ml-[-25px] mt-20 focus:outline-none cursor-pointer bg-gray-200 p-3 rounded-full"
                @click="transform += 398; transform = (transform > 0) ? -398 * (totalItems - 1) : transform">

                <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
            <h1 class="text-3xl font-semibold">Design&Web</h1>
                <div id="slider2"
                    class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700"
                    x-bind:style="'transform: translateX(' + transform + 'px)'">
                    @foreach ($webServices as $webService)
                        <div x-data="{ title: '{{ $webService->service_name }}' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="{{ asset('storage/' . $webService->image) }}" alt="{{ $webService->service_name }}" height="200px" width="200px" />
                            <div class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                                <h3 x-text="title" class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900"></h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <button aria-label="slide forward" class="absolute z-30 right-0 mr-[-35px] mt-20 focus:outline-none cursor-pointer bg-gray-200 p-3 rounded-full"
                @click="transform -= 398; transform = (transform < -398 * (totalItems - 1)) ? 0 : transform">
                <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>
</div>

<div class="testimonials mt-10">
<h1 class="text-3xl font-semibold text-center">Testimonials</h1>

<div x-data="{ transform: 0, totalItems: 5}">
    <div class="flex items-center justify-center py-24 sm:py-8 px-4">
        <div class="relative flex items-center justify-center w-1/2 h-60 mx-auto">
                <button aria-label="slide backward" class="absolute z-30 left-0 ml-[-30px] mt-[-30px] focus:outline-none cursor-pointer bg-gray-200 p-3 rounded-full"
                @click="transform += 398; transform = (transform > 0) ? -398 * (totalItems - 1) : transform">

                <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                <div id="slider3"
                    class="flex flex-row lg:gap-8 md:gap-6 gap-14 justify-start transition ease-out duration-700"
                    x-bind:style="'transform: translateX(' + transform + 'px)'">
                    
                    <div class="p-5 w-1/2 rounded-lg border border-gray-100 shadow-lg space-y-2">
                        <div class="text-justify text-[12px] text-gray-500">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat explicabo recusandae ullam. Reprehenderit temporibus id doloribus explicabo deserunt officiis soluta, voluptate adipisci optio, odit perferendis consequuntur corporis earum, provident ullam.</p>

                        </div>

                        <div class="flex items-center space-x-1"> 
                            <div class="bg-slate-500 rounded-full h-16 w-16">
                                <img src="{{asset('build/assets/images/sita.png')}}" alt="hello">
                            </div> 
                            <p class="text-center item">Name</p> 

                        </div>
                    </div>

                    <div class="p-5 w-1/2 rounded-lg border border-gray-100 shadow-lg space-y-2">
                        <div class="text-justify text-[12px] text-gray-500">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat explicabo recusandae ullam. Reprehenderit temporibus id doloribus explicabo deserunt officiis soluta, voluptate adipisci optio, odit perferendis consequuntur corporis earum, provident ullam.</p>

                        </div>

                        <div class="flex items-center space-x-1"> 
                            <div class="bg-slate-500 rounded-full h-16 w-16">
                                <img src="{{asset('build/assets/images/sita.png')}}" alt="hello">
                            </div> 
                            <p class="text-center item">Name</p> 

                        </div>
                    </div>    
                </div>
            </div>
            <button aria-label="slide forward" class="absolute z-30 right-0 mr-[-30px] mt-[-30px] focus:outline-none cursor-pointer bg-gray-200 p-3 rounded-full"
                @click="transform -= 398; transform = (transform < -398 * (totalItems - 1)) ? 0 : transform">
                <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>
</div>
</div>



  
@endsection