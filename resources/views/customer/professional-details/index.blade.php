@extends('layouts.users.app')
@section('title')
Professional Details  
@endsection

@section('content')
<section class="w-4/5 py-8 px-5 mx-auto">
  <div class="flex justify-between mb-10">
    <div class="flex space-x-8">
      <div>
        <img src="{{asset('build/assets/images/default-profile.png')}}" alt="profile-image" class="h-16 w-16">
      </div>
      <div>
        <h1 class="font-semibold text-xl">Zelions Huijsman</h1>
        **** Good 4.0
      </div>
    </div>

    <div>
      <button class="bg-blue-700 text-white px-8 py-2 rounded-md">
        Book Now
      </button>
    </div>
  </div>

  <div class="mb-10">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
    Accusantium voluptas rem molestiae repellat illo, perferendis
    nesciunt animi vitae cumque sint blanditiis iure voluptatibus necessitatibus hic
    , placeat quisquam perspiciatis. Sequi, labore.</p>
  </div>

  <!-- overview, business hours & socials -->
  <div class="flex justify-between mb-10">
    <div class="bg-slate-100 rounded-md py-2 px-4">
      <h2 class="mb-3 text-l font-semibold">Overview</h2>
      <div class="flex flex-col space-y-3">
        <div class="flex space-x-3">
          <div>
            <img src="" alt="icon">
          </div>
          <p>Hired 10 times</p>
        </div>

        <div class="flex space-x-3">
          <div>
            <img src="" alt="icon">
          </div>
          <p>5 employees</p>
        </div>

        <div class="flex space-x-3">
          <div>
            <img src="" alt="icon">
          </div>
          <p>5 years in business</p>
        </div>

        <div class="flex space-x-3">
          <div>
            <img src="" alt="icon">
          </div>
          <p>Verified Payment</p>
        </div>
      </div>
    </div>

    <div class="bg-slate-100 py-2 px-4 rounded-md">
      <h2 class="mb-3 font-semibold text-l">Business Hours</h2>
      <div class="flex space-x-40">
        <div>
          <p>Sunday</p>
          <p>Monday</p>
          <p>Tuesday</p>
          <p>Wednesday</p>
          <p>Thursday</p>
          <p>Friday</p>
          <p>Saturday</p>
        </div>
        <div>
          <p>8:00am - 5:00pm</p>
          <p>8:00am - 5:00pm</p>
          <p>8:00am - 5:00pm</p>
          <p>8:00am - 5:00pm</p>
          <p>8:00am - 5:00pm</p>
          <p>8:00am - 5:00pm</p>
          <p>8:00am - 5:00pm</p>
        </div>
      </div>
    </div>

    <div class="bg-slate-100 py-2 px-4 rounded-md">
      <h2 class="mb-3 text-l font-semibold">Socials</h2>
      <ul class="grid grid-cols-2 gap-x-16 gap-y-5 text-blue-500 font-semibold">
        <li>Facebook</li>
        <li>Tiktok</li>
        <li>Instagram</li>
        <li>Twitter</li>
        <li>LinkedIn</li>
        <li>Facebook</li>
      </ul>
    </div>
  </div>


  <!-- Photos -->

  <div x-data="{ transform: 0, totalItems: 5 }" class="mb-10">
    <h1 class="text-xl font-semibold">Photos</h1>
    <div class="flex items-center justify-center py-24 sm:py-8 px-4">
        <div class="relative flex items-center justify-center w-3/4 h-60 mx-auto">
            <button aria-label="slide backward" class="absolute z-30 left-0 ml-[-25px] mt-15 focus:outline-none cursor-pointer bg-gray-200 p-3 rounded-full"
                @click="transform += 398; transform = (transform > 0) ? -398 * (totalItems - 1) : transform">

                <svg class="dark:text-gray-900" width="12" height="12" viewBox="0 0 8 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                <div id="slider"
                    class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700"
                    x-bind:style="'transform: translateX(' + transform + 'px)'">
                    <!-- foreach loop -->
                        <div x-data="{ title: '' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="{{asset('build/assets/images/Plumber.png')}}" alt="" height="300px" width="300px" />
                            <div class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                                <h3 x-text="title" class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900"></h3>
                            </div>
                        </div>
                    <!-- end foreach  -->

                        <div x-data="{ title: '' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="{{asset('build/assets/images/Plumber.png')}}" alt="" height="300px" width="300px" />
                            <div class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                                <h3 x-text="title" class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900"></h3>
                            </div>
                        </div>

                        <div x-data="{ title: '' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="{{asset('build/assets/images/Plumber.png')}}" alt="" height="300px" width="300px" />
                            <div class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                                <h3 x-text="title" class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900"></h3>
                            </div>
                        </div>

                        <div x-data="{ title: '' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="{{asset('build/assets/images/Plumber.png')}}" alt="" height="300px" width="300px" />
                            <div class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                                <h3 x-text="title" class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900"></h3>
                            </div>
                        </div>

                        <div x-data="{ title: '' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="{{asset('build/assets/images/Plumber.png')}}" alt="" height="300px" width="300px" />
                            <div class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                                <h3 x-text="title" class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900"></h3>
                            </div>
                        </div>
                </div>
            </div>
            <button aria-label="slide forward" class="absolute z-30 right-0 mr-[-38px] mt-15 focus:outline-none cursor-pointer bg-gray-200 p-3 rounded-full"
                @click="transform -= 398; transform = (transform < -398 * (totalItems - 1)) ? 0 : transform">
                <svg class="dark:text-gray-900" width="12" height="12" viewBox="0 0 8 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>
</div>


<!-- reviews -->

<div>
  <h1 class="mb-5 font-semibold text-xl">Reviews</h1>
  <div class="flex space-x-8">
    <div>
      <img src="{{asset('build/assets/images/default-profile.png')}}" alt="" class="h-16 w-20">
    </div>

    <div>
      <div class="mb-5">
        <h3 class="font-semibold text-l">Zelions Huijsman</h3>
        ****   Good 4.0
      </div>
      <div class="mb-8">
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat officia dolore maxime
          reiciendis facilis. Modi officia laudantium doloribus dignissimos unde fugit odio saepe
          aliquid nesciunt, nemo eligendi esse obcaecati quia.
        </p>
      </div>

      <div class="bg-gray-200 p-2 rounded-md">
        <h3 class="mb-3 font-semibold text-l text-gray-700">Reply</h3>
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat officia dolore maxime
          reiciendis facilis. Modi officia laudantium doloribus dignissimos unde fugit odio saepe
          aliquid nesciunt, nemo eligendi esse obcaecati quia.
        </p>
      </div>
    </div>
  </div>
</div>


</section>
@endsection