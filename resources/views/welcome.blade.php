@extends('layouts.users.app')

@section('title')
@auth    
Welcome,&nbsp;<span>{{auth()->user()->username}}</span>
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


<!-- <div>
  <h1 class="text-3xl font-semibold w-1/2 p-5 mx-auto">Home</h1>
  <div class="flex space-x-8 w-1/2 mx-auto p-5">
    <div class="w-1/3">
      <div class="rounded-full">
        <img src="{{asset('build/assets/images/cleaning.png')}}" alt="" class="w-full h-full">
      </div>
      <p>Cleaning</p>
    </div>

    <div class="rounded-lg w-1/3">
      <img src="{{asset('build/assets/images/cleaning.png')}}" alt="" class="w-full">
      <p>Cleaning</p>
    </div>

    <div class="rounded-lg w-1/3">
      <img src="{{asset('build/assets/images/cleaning.png')}}" alt="" class="w-full rounded-lg">
      <p>Cleaning</p>
    </div>
  </div>
</div> -->


<!-- <h1>Home</h1>

<div class="flex items-center justify-center py-24 sm:py-8 px-4">

            <div class="relative flex items-center justify-center w-1/2 h-60 mx-auto">
                <button aria-label="slide backward" class="absolute z-30 left-0 ml-10 focus:outline-none cursor-pointer bg-gray-500 p-3 rounded-full" id="prev">
                    <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                    <div id="slider" class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="{{asset('build/assets/images/sweeping.png')}}" alt="black chair and white table" height="200px" width="200px"/>
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Cleaning</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/Electrician.png')}}" alt="black chair and white table" height="200px" width="200px"/>
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Electrician</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/Plumber.png')}}" alt="black chair and white table" height="200px" width="200px"/>
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Plumber</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/SoftwareDevelopment.png')}}" alt="black chair and white table" height="200px" width="200px"/>
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Software Development</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/WebDesign.png')}}" alt="black chair and white table" height="200px" width="200px"/>
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Web Design</h3>
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>
                </div>
                <button aria-label="slide forward" class="absolute z-30 right-0 mr-10 focus:outline-none cursor-pointer bg-gray-500 p-3 rounded-full" id="next">
                    <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
</div>

      
        
    <script>
      let defaultTransform = 0;
      function goNext() {
          defaultTransform = defaultTransform - 398;
          var slider = document.getElementById("slider");
          if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7) defaultTransform = 0;
          slider.style.transform = "translateX(" + defaultTransform + "px)";
      }
      next.addEventListener("click", goNext);
      function goPrev() {
          var slider = document.getElementById("slider");
          if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
          else defaultTransform = defaultTransform + 398;
          slider.style.transform = "translateX(" + defaultTransform + "px)";
      }
      prev.addEventListener("click", goPrev);

    </script> -->


    <div x-data="{ transform: 0, totalItems: 5}">
    <div class="flex items-center justify-center py-24 sm:py-8 px-4">
        <div class="relative flex items-center justify-center w-1/2 h-60 mx-auto">
            <!-- <button aria-label="slide backward" class="absolute z-30 left-0 ml-10 focus:outline-none cursor-pointer bg-gray-500 p-3 rounded-full"
                @click="transform -= 398; transform = (transform < -398 * (totalItems - 1)) ? 0 : transform"> -->
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
                    <div x-data="{ title: 'Cleaning' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/sweeping.png')}}" alt="black chair and white table"
                            height="200px" width="200px" />
                        <div
                            class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                            <h3 x-text="title"
                                class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">
                            </h3>
                        </div>
                    </div>

                    <div x-data="{ title: 'Electrician' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/Electrician.png')}}" alt="black chair and white table"
                            height="200px" width="200px" />
                        <div
                            class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                            <h3 x-text="title"
                                class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">
                            </h3>
                        </div>
                    </div>

                    <div x-data="{ title: 'Plumber' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/Plumber.png')}}" alt="black chair and white table"
                            height="200px" width="200px" />
                        <div
                            class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                            <h3 x-text="title"
                                class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">
                            </h3>
                        </div>
                    </div>

                    <div x-data="{ title: 'Web Design' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/WebDesign.png')}}" alt="black chair and white table"
                            height="200px" width="200px" />
                        <div
                            class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                            <h3 x-text="title"
                                class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">
                            </h3>
                        </div>
                    </div>

                    <div x-data="{ title: 'Software Development' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/SoftwareDevelopment.png')}}" alt="black chair and white table"
                            height="200px" width="200px" />
                        <div
                            class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                            <h3 x-text="title"
                                class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">
                            </h3>
                        </div>
                    </div>
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



<div x-data="{ transform: 0, totalItems: 5}">
    <div class="flex items-center justify-center py-24 sm:py-8 px-4">
        <div class="relative flex items-center justify-center w-1/2 h-60 mx-auto">
            <!-- <button aria-label="slide backward" class="absolute z-30 left-0 ml-10 focus:outline-none cursor-pointer bg-gray-200 p-3 rounded-full"
                @click="transform -= 398; transform = (transform < -398 * (totalItems - 1)) ? 0 : transform"> -->
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
                    <div x-data="{ title: 'Cleaning' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/sweeping.png')}}" alt="black chair and white table"
                            height="200px" width="200px" />
                        <div
                            class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                            <h3 x-text="title"
                                class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">
                            </h3>
                        </div>
                    </div>

                    <div x-data="{ title: 'Electrician' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/Electrician.png')}}" alt="black chair and white table"
                            height="200px" width="200px" />
                        <div
                            class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                            <h3 x-text="title"
                                class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">
                            </h3>
                        </div>
                    </div>

                    <div x-data="{ title: 'Plumber' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/Plumber.png')}}" alt="black chair and white table"
                            height="200px" width="200px" />
                        <div
                            class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                            <h3 x-text="title"
                                class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">
                            </h3>
                        </div>
                    </div>

                    <div x-data="{ title: 'Web Design' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/WebDesign.png')}}" alt="black chair and white table"
                            height="200px" width="200px" />
                        <div
                            class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                            <h3 x-text="title"
                                class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">
                            </h3>
                        </div>
                    </div>

                    <div x-data="{ title: 'Software Development' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/SoftwareDevelopment.png')}}" alt="black chair and white table"
                            height="200px" width="200px" />
                        <div
                            class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                            <h3 x-text="title"
                                class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">
                            </h3>
                        </div>
                    </div>
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



<div x-data="{ transform: 0, totalItems: 5}">
    <div class="flex items-center justify-center py-24 sm:py-8 px-4">
        <div class="relative flex items-center justify-center w-1/2 h-60 mx-auto">
            <!-- <button aria-label="slide backward" class="absolute z-30 left-0 ml-10 focus:outline-none cursor-pointer bg-gray-200 p-3 rounded-full"
                @click="transform -= 398; transform = (transform < -398 * (totalItems - 1)) ? 0 : transform"> -->
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
                    <div x-data="{ title: 'Cleaning' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/sweeping.png')}}" alt="black chair and white table"
                            height="200px" width="200px" />
                        <div
                            class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                            <h3 x-text="title"
                                class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">
                            </h3>
                        </div>
                    </div>

                    <div x-data="{ title: 'Electrician' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/Electrician.png')}}" alt="black chair and white table"
                            height="200px" width="200px" />
                        <div
                            class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                            <h3 x-text="title"
                                class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">
                            </h3>
                        </div>
                    </div>

                    <div x-data="{ title: 'Plumber' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/Plumber.png')}}" alt="black chair and white table"
                            height="200px" width="200px" />
                        <div
                            class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                            <h3 x-text="title"
                                class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">
                            </h3>
                        </div>
                    </div>

                    <div x-data="{ title: 'Web Design' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/WebDesign.png')}}" alt="black chair and white table"
                            height="200px" width="200px" />
                        <div
                            class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                            <h3 x-text="title"
                                class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">
                            </h3>
                        </div>
                    </div>

                    <div x-data="{ title: 'Software Development' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="{{asset('build/assets/images/SoftwareDevelopment.png')}}" alt="black chair and white table"
                            height="200px" width="200px" />
                        <div
                            class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                            <h3 x-text="title"
                                class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">
                            </h3>
                        </div>
                    </div>
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
            <!-- <button aria-label="slide backward" class="absolute z-30 left-0 ml-10 focus:outline-none cursor-pointer bg-gray-200 p-3 rounded-full"
                @click="transform -= 398; transform = (transform < -398 * (totalItems - 1)) ? 0 : transform"> -->
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