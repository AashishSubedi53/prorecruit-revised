<div>
    <section class="w-4/5 py-8 px-5 mx-auto">
        <div class="flex justify-between mb-10">
          <div class="flex space-x-8">
            <div>
              <img src="{{asset('storage/' . $professional->profile_image)}}" alt="profile-image" class="h-20 w-20">
            </div>
            <div>
              <h1 class="font-semibold text-xl mb-3">{{$professional->user->username}}</h1>
              {{-- **** Good 4.0 // here i want to display the average rating of this professional --}}
              <p class="font-semibold"><span class="font-bold text-xl">{{ number_format($averageRating, 1) }}</span> out of <span class="font-bold text-xl">5</span></p>
              <div class="flex space-x-2 items-center">
                @for ($i = 1; $i <= 5; $i++)
                    <svg class="w-4 h-4 {{ $i <= $averageRating ? 'text-yellow-300' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                @endfor
                &nbsp;<span class="underline underline-offset-2">({{$totalRatings}} reviews)</span>
            </div>                                   
            </div>
          </div>   

          <div>
            {{-- <button wire:click="proServiceId = {{$proService->id}}" --}}
              <button
              x-data=""
              x-on:click.prevent="$dispatch('open-modal', 'book-now-fields')" 
              class="bg-green-600 text-white w-32 h-10 rounded-lg">Book Now</button>

              <x-modal name="book-now-fields" :show="$errors->first()">
                <form wire.submit.prevent="submit" class="p-6 w-3/4 flex flex-col space-y-3">
                    <h2 class="text-xl font-bold mb-4">
                        Booking Details
                    </h2>
                    {{-- <input wire:model="proServiceId" type="text"> --}}
    
                    
                <div class="relative">
                    <label for="bookingDate" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Select time:</label>
                    <div class="absolute inset-y-0 start-0 mt-7 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                    </svg>
                    </div>
                    <input datepicker wire:model="bookingDate" id="bookingDate" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                </div>
    
                <div class="relative">
                    <label for="time" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Select time:</label>
                    <div class="absolute inset-y-0 start-0 mt-7 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    {{-- <input type="time" id="time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" required /> --}}
                    <input type="time" wire:model="bookingTime" id="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  min="09:00" max="18:00" value="00:00" required />
                </div>

                <div>
                  <label for="professional_service" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Select Professional Service</label>
                  <select id="professional_service" wire:model="selectedService" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Select a service" selected disabled>Select a service</option>
                    @foreach ($professional->service as $proService)
                      <option value="{{$proService->service_id}}">{{$proService->service->service_name}}</option>
                    @endforeach
                    {{-- @foreach ($proServices as $proService)
                      <option value="{{$proService->id}}">{{$proService->service->service_name}}</option>
                    @endforeach --}}
                  </select>
                </div>
    
                {{-- <div>
                  <label for="paymentMode" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Select Payment Mode</label>
                  <select id="paymentMode" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option value="Select Payment Mode" selected disabled>Select Payment Mode</option>
                      <option value="Stripe">Stripe</option>
                      <option value="Khalti">Khalti</option>
                  </select>
                </div> --}}
    
                <div>
                    <label for="address" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                    <input type="text" wire:model="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div>
                    <label for="city" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">City</label>
                    <input type="text" wire:model="city" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div>
                    <label for="pin_code" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">PIN Code</label>
                    <input type="text" wire:model="pin_code" id="pin_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
    
                
                <div>
                    <label for="message" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Additional Details</label>
                    <textarea id="message" wire:model="additionalDetails" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your additional booking details here..."></textarea>
                </div>
    
    
                </form>
    
                <div class="flex space-x-1 px-6 mb-3">
                    <button x-on:click="$dispatch('close')" class="bg-rose-700 text-white px-4 py-2 rounded-md">
                        {{ __('Cancel') }}
                    </button>
    
                    <button wire:click="submit" class="bg-blue-700 text-white p-2 rounded-md">
                        Submit
                    </button>
                </div>
            </x-modal> 
          </div>
        </div>
      @foreach ($professional->service as $service)
        
        <div class="mb-10">
          <p>{{$service->description}}</p>
        </div>
        @endforeach

      
        <!-- overview, business hours & socials -->
        <div class="flex justify-between mb-10">
          <div class="bg-slate-100 rounded-md py-2 px-4">
            <h2 class="mb-3 text-l font-semibold">Overview</h2>
            <div class="flex flex-col space-y-3">
              <div class="flex space-x-3">
                <div class="h-10 w-10">
                  <img src="{{asset('storage/icons/Frame.png')}}" alt="icon" class="w-full h-full">
                </div>
                <p>Hired 10 times</p>
              </div>
      
              <div class="flex space-x-3 ">
                <div class="h-10 w-10">
                  <img src="{{asset('storage/icons/Frame.png')}}" alt="icon" class="w-full h-full">
                </div>
                <p>5 employees</p>
              </div>
      
              <div class="flex space-x-3">
                <div class="h-10 w-10">
                  <img src="{{asset('storage/icons/Frame.png')}}" alt="icon" class="w-full h-full">
                </div>
                <p>5 years in business</p>
              </div>
      
              <div class="flex space-x-3">
                <div class="h-10 w-10">
                  <img src="{{asset('storage/icons/Frame.png')}}" alt="icon" class="w-full h-full">
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
            <ul class="grid grid-cols-2 gap-x-16 gap-y-5 text-blue-500 font-semibold cursor-pointer">
              <li><a href="https://www.facebook.com">Facebook</a></li>
              <li>Tiktok</li>
              <li>Instagram</li>
              <li>Twitter</li>
              <li>LinkedIn</li>
              <li>Facebook</li>
            </ul>
          </div>
        </div>
      
      
        <!-- Photos -->
      
        <div x-data="{ transform: 0, totalItems: {{count($images ?? [])}} }" class="mb-10">
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
                          @foreach ($images as $image)                            
                              <div x-data="{ title: '' }" class="flex flex-shrink-0 relative w-full sm:w-auto">
                                  <img src="{{asset('storage/' . $image->url)}}" alt="" height="300px" width="300px" />
                                  <div class="bg-opacity-30 absolute w-full h-full p-6 flex flex-col justify-end">
                                      <h3 x-text="title" class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900"></h3>
                                  </div>
                              </div>
                              @endforeach
                          <!-- end foreach  -->                          
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
      
      <div class="mb-10">
        <h1 class="mb-5 font-semibold text-xl">Reviews</h1>
        @foreach ($reviews as $review)  
        <div class="flex space-x-8">
          <div class="">
            <img src="{{asset('storage/' . $review->customer->profile_image)}}" alt="" class="h-16">
          </div>
      
          <div>
            <div class="mb-5">
              <h3 class="font-semibold text-l">{{$review->customer->first_name}} {{$review->customer->last_name}}</h3>
              <p class="flex flex-row items-center gap-x-2">              
                <span class="flex">
                  @for ($i=1; $i <= $review->stars; $i++)
                      <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                      </svg>
                  @endfor
                </span>  
                 <span class="text-white text-sm bg-blue-500 p-1 rounded-md">{{$review->professionalService->service->service_name}}</span>
              </p>
            </div>
            <div class="mb-8">
              <p>
                {{$review->comments}}
              </p>
            </div>
      
            {{-- <div class="bg-gray-200 p-2 rounded-md mb-10">
              <h3 class="mb-3 font-semibold text-l text-gray-700">Reply</h3>
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat officia dolore maxime
                reiciendis facilis. Modi officia laudantium doloribus dignissimos unde fugit odio saepe
                aliquid nesciunt, nemo eligendi esse obcaecati quia.
              </p>
            </div> --}}
          </div>
        </div>
        @endforeach
      </div>

      <h2 class="mb-5 font-semibold text-xl">Rate this service</h2>
      <form wire:submit="saveRatings" class="pl-0">
        <div class="items-center mb-2">         
          <div x-data="{ rating: @entangle('rating') }" class="flex flex-col mb-3">
            <div class="flex">
                <template x-for="star in 5" :key="star">
                    <svg x-on:click="rating = star" :class="{ 'text-yellow-300': star <= rating, 'text-gray-300': star > rating }" class="w-6 h-6 cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                </template>
            </div>
            <p class="block">Your Rating: <span x-text="rating"></span></p>
          </div> 

          <h3>Review on which service?</h3>
          <select wire:model="selectProfessionalService" id="selectProfessionalService" class="border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 cursor-pointer">
            <option>Select Service for Reviews</option>
               @foreach ($proServices as $proService)
                 
               <option value="{{ $proService->id }}">{{ $proService->service->service_name }}</option>
               @endforeach
              
          </select>
        </div>

        <div class="mb-2 w-1/2">
          {{-- <label for="comments" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Comment
          </label> --}}
          <textarea type="text" wire:model.live="comments" id="comments" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-500 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" @error('comments') border-red-500  @enderror" placeholder="Your comment"></textarea>
          @error('comments')
              <span class="text-red-500">{{$message}}</span>
          @enderror
        </div>
      <button class="bg-blue-700 py-2 px-4 text-white rounded-md">Submit</button>
    </form>
  </section>
</div>
