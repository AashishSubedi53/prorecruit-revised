@push('script')
  @vite('resources/js/flowbite.js')
@endpush
<div>
    <div class="flex p-8">
        {{-- <p>@if ($enteredService = session('enteredService'))
            {{$enteredService}}
        @endif</p> --}}
        <!-- Left menu -->
        <div class="w-1/4 mr-4 border border-gray-200 rounded-md py-5 px-3">
            <div class="relative w-full mb-5">
                <input type="search" wire:model="selectedLocation" wire:keydown.enter="filterByLocation" id="search-dropdown" class="block p-2.5 py-4 w-full z-20 text-sm text-gray-900 bg-gray-50 border border-gray-200 rounded-md" placeholder="Search by city, province, postal codes..." required />
                <button type="submit" wire:click="filterByLocation" wire:loading.attr="disabled" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-700">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
            <h2 class="text-lg font-bold text-gray-700">Select Services</h2>
            <ul class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white space-y-2 mt-2">
                {{-- @foreach ($services as $service)               
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id={{$service->id}} type="checkbox" wire:model="selectedServices" value="{{$service->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for={{$service->id}} class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$service->service_name}}</label>
                    </div>
                </li>
                @endforeach --}}

                @foreach ($services as $service)               
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id={{$service->id}} type="checkbox" wire:model="selectedServices" value="{{$service->id}}"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                @if(in_array($service->id, $selectedServices)) checked @endif>
                            <label for={{$service->id}} class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$service->service_name}}</label>
                        </div>
                    </li>
                @endforeach

            </ul>
          <button wire:click="filterByService" wire:loading.attr="disabled" type="submit" class="bg-blue-600 text-white w-full h-12 rounded-lg mt-4">Apply Now</button>
        </div>

        <!-- Right content -->
        <div class="w-3/4 p-5 relative">
            <div class="absolute inset-0 bg-gray-800 bg-opacity-50 backdrop-filter backdrop-blur-sm z-10 text-center" wire:loading>
                <div class="pt-[25%] text-white text-2xl font-semibold">
                    Please wait...
                </div>
            </div>

          <h2 class="text-lg font-bold text-gray-700">Professionals</h2>
            @foreach ($professionalServices as $proService) 
            {{-- {{dd($proService)}}              --}}
        <div class="flex bg-white shadow-lg rounded-lg p-4 mt-4 border border-gray-200">
            <div class="h-40 w-40 sm:w-48 md:w-64 lg:w-80 xl:w-96 mr-5">
                <img src="{{asset('storage/' . $proService->professional->profile_image)}}" alt="Profile picture" class="h-full w-full object-cover rounded-lg">
            </div>
            <div class="flex flex-col w-full space-y-3"> 
                <h3 class="text-gray-800 font-semibold">{{$proService -> professional ->user->username}}</h3>
                <h2 class="text-gray-600 font-semibold">Service: {{$proService->service->service_name}}</h2>
                <div class="flex items-center space-x-1">
                  <img src="{{asset('storage/icons/location.png')}}" alt="" class="h-5 w-5"> 
                  <p class="text-gray-600">
                    {{$proService -> professional-> address -> province}}, {{$proService->professional->address->city}}, {{$proService->professional->address->postal_code}}
                    </p>
                    &nbsp;
                    &nbsp;
                  <img src="{{asset('storage/icons/clock.png')}}" alt="" class="h-5 w-5"><p class="text-gray-600">{{$proService->price}}</p>
                </div>
                <p class="text-gray-600">
                    {{-- {{$proService->description}} --}}
                    {{substr($proService->description, 0, 100)}}...

                </p>
            </div>
            <div class="flex space-x-1">
                <button class="bg-blue-600 text-white w-32 h-10 rounded-lg"><a href="{{route('customer.professional-details.index',$proService->professional->id)}}">View Profile</a></button>
                <button wire:click="proServiceId = {{$proService->id}}"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'book-now-fields')" 
                    class="bg-green-600 text-white w-32 h-10 rounded-lg">Book Now</button>              
            </div>
        </div>
        @endforeach    
        </div>
        <x-modal name="book-now-fields" :show="$errors->first()">
            <form wire:submit.prevent="submit" class="p-6 w-3/4 flex flex-col space-y-3">
                <h2 class="text-xl font-bold mb-4">
                    Booking Details
                </h2>
                <input wire:model="proServiceId" type="text" hidden>               

                
            <div class="relative">
                <label for="bookingDate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select date:</label>
                <div class="absolute inset-y-0 start-0 mt-7 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
                </div>
                <input datepicker wire:model="bookingDate" id="bookingDate" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
            </div>

            <div class="relative">
                <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select time:</label>
                <div class="absolute inset-y-0 start-0 mt-7 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                    </svg>
                </div>
                {{-- <input type="time" id="time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" required /> --}}
                <input timepicker type="text" wire:model="bookingTime" id="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  min="09:00" max="18:00" value="00:00" required />
            </div>

            {{-- <label for="paymentMode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Payment Mode</label>
            <select id="paymentMode" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="Select Payment Mode" selected disabled>Select Payment Mode</option>
                <option value="Stripe">Stripe</option>
                <option value="Khalti">Khalti</option>
            </select> --}}

            <div>
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                <input type="text" wire:model="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                <input type="text" wire:model="city" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="pin_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PIN Code</label>
                <input type="text" wire:model="pin_code" id="pin_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>

            
            <div>
                <label for="additionalDetails" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Additional Details</label>
                <textarea id="additionalDetails" wire:model="additionalDetails" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your additional booking details here..."></textarea>
            </div>

            <div class="flex space-x-1 px-6 mb-3">
                <button x-on:click="$dispatch('close')" class="bg-rose-700 text-white px-4 py-2 rounded-md">
                    {{ __('Cancel') }}
                </button>

                <button wire:click="submit"  class="bg-blue-700 text-white p-2 rounded-md cursor-pointer">
                    Submit
                </button>
            </div>

            </form>

            
        </x-modal>  
      </div>
</div>
