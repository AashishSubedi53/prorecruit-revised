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
          <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-700">Search</button>
      </div>
  </form>
  @endif
@endauth    
  
@endsection

@section('content')

<div class="bg-slate-200">
  <div class="flex justify-center space-x-12 p-10 text-center">
    <div>
      <a href=""><img src="{{asset('storage/icons/home.png')}}" alt="home" height="50px" width="50px"></a>
      <p>Home</p>
    </div>
    <div>
      <a href=""><img src="{{asset('storage/icons/Health.png')}}" alt="health" height="50px" width="50px"></a>
      <p>Health</p>
    </div>
    <div>
      <a href=""><img src="{{asset('storage/icons/events.png')}}" alt="events" height="50px" width="50px"></a>
      <p>Events</p>
    </div>
    <div>
      <a href=""><img src="{{asset('storage/icons/business.png')}}" alt="business" height="50px" width="50px"></a>
      <p>Business</p>
    </div>
    <div>
      <a href=""><img src="{{asset('storage/icons/design&web.png')}}" alt="design&web" height="50px" width="50px"></a>
      Design&Web
    </div>
    <div>
      <a href=""><img src="{{asset('storage/icons/more.png')}}" alt="more" height="50px" width="50px"></a>
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

<div class="testimonials">
    <h1 class="text-3xl font-semibold text-center mb-5">Testimonials</h1>

    <div id="testimonial-carousel" class="relative w-1/2 mx-auto" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative overflow-hidden rounded-lg md:h-64">
            @foreach ($testimonials as $key => $testimonial)
                <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                    <div class="p-5 w-full rounded-lg border border-gray-100 shadow-lg space-y-2">
                        <div class="text-justify text-[12px] text-gray-500 text-xl">
                            <p>{{ $testimonial->description }}</p>
                        </div>

                        <div class="flex items-center space-x-1"> 
                            <div class="bg-slate-500 rounded-full h-16 w-16">
                                <img src="{{ asset('storage/' . $testimonial->user_image) }}" alt="user image" class="h-full w-full object-cover rounded-full">
                            </div> 
                            <p class="text-center item">{{ $testimonial->username }}</p> 
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            @for ($i = 0; $i < count($testimonials); $i++)
                <button type="button" class="w-3 h-3 rounded-full" aria-current="{{ $i === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $i + 1 }}" data-carousel-slide-to="{{ $i }}"></button>
            @endfor
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-[-50px] z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-300 dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-[-50px] z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-300 dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
</div>  
@endsection