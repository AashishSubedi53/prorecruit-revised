{{-- <div>
    <div class="flex flex-col space-y-3 w-1/2 p-5"> 
        <!-- Service categories select menu... -->
        <form wire:submit.prevent="update">            
            <div>
                <label for="selectedCategory">Select Service Category</label>
                <select wire:model="selectedCategory" wire:change="changeCategory" id="selectedCategory" class="cursor-pointer w-full">
                    <option value="-1">Select Category</option>
                    @foreach ($categories as $serviceCategory)
                        <option @if ($serviceCategory->id === $proService->service_category_id) selected='selected' @endif value="{{ $serviceCategory->id }}">{{ $serviceCategory->category_name }}</option>                            
                    @endforeach
                </select>
            </div>
        
            <!-- Services dependent select menu... -->
            <div class="relative flex flex-col">
                <label for="selectedService">Select Service</label>
                <p wire:loading class="absolute top-0 bottom-0 left-0 right-0 z-10 px-3 py-2 bg-white bg-opacity-90">
                    Loading...        
                </p>    
                <select wire:model="selectedService" id="selectedService" class="cursor-pointer w-full">
                    <option value="-1">Select Service</option>
                    @foreach ($services as $service)
                        <option @if ($service->id === $proService->service_id) selected='selected' @endif value="{{ $service->id }}">{{ $service->service_name }}</option>
                    @endforeach
                </select>
            </div>
        
            <!-- Time selection fields -->
            <div class="flex flex-col">
                <h3 class="inline-block">Business Hours</h3>    
                <div class="flex space-x-5">
                    <select wire:model="selectedTimeFrom" id="selectedTimeFrom" class="w-full cursor-pointer">
                        <option value="-1">From</option>
                        @for ($i=1; $i<=12; $i++)
                            <option value="{{ $i }}">{{ $i }} am</option>
                        @endfor
                    </select>
            
                    <select wire:model="selectedTimeTo" id="selectedTimeTo" class="w-full cursor-pointer">
                        <option value="-1">To</option>
                        @for ($i=1; $i<=12; $i++)
                            <option value="{{ $i }}">{{ $i }} pm</option>
                        @endfor
                    </select>
                </div>
            </div>
            
        
            <div>
                <label for="price">Price (per Hour)</label>
                <input type="number" step="0.01" wire:model.live="price" id="price" class="w-full @error('price') border-red-500  @enderror" placeholder="Rs. xxxx">
                @error('price')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
        
            <div>
                <label for="ServiceDescription">ServiceDescription</label>
                <textarea type="text" wire:model.live="serviceDescription" id="ServiceDescription" class="w-full @error('serviceDescription') border-red-500  @enderror" placeholder="Service Description"></textarea>
                @error('serviceDescription')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
        
            <!-- Form submission button -->
            <button type="submit" class="bg-blue-700 text-white py-2 px-4 rounded-md w-full">
                Submit
            </button>
        </form>
    </div>
    
    
    
</div> --}}



<div>
    <div class="bg-blue-700 pt-10 pb-5 text-white mb-10">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <h3 class="text-2xl font-semibold">
                    Edit Services
                </h3>   
                <a href="{{route('professional.my-services.index')}}" class="text-blue-500 shadow font-semibold bg-white p-3 px-5 rounded-full">Go back</a> 
            </div>
        </div>
    </div> 

    @if($message = Session::get('success'))
    <div class="fixed bottom-0 pb-4 w-full pointer-events-none">
        <div class="container mx-auto flex justify-end">
            <div class="mb-4 pointer-events-auto p-5 inline-flex overflow-hidden w-full max-w-lg bg-white rounded-lg shadow-md">
                <div class="flex justify-center items-center w-12 bg-blue-500">
                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z">
                        </path>
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
    </div>
    @endif
    {{-- @section('content') --}}
    <div class="flex flex-col space-y-3 container mx-auto mb-5">
        
        <!-- Service categories select menu... -->
        <form wire:submit.prevent="update" class="max-w-lg mb-5">
            <div class="mb-5">
                <label for="selectedCategory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Select Service Category
                </label>
                <select wire:model="selectedCategory" wire:change="changeCategory" id="selectedCategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 cursor-pointer">
                    <option value="-1">Select Category</option>
                    @foreach ($categories as $serviceCategory)
                        <option @if ($serviceCategory->id === $proService->service_category_id) selected='selected' @endif value="{{ $serviceCategory->id }}">{{ $serviceCategory->category_name }}</option>                            
                    @endforeach
                </select>
            </div>
        
            <!-- Services dependent select menu... -->
            <div class="relative flex flex-col mb-5">
                <label for="selectedService" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Select Service
                </label>
                <p wire:loading class="absolute top-0 bottom-0 left-0 right-0 z-10 px-3 py-2 bg-white bg-opacity-90">
                    Loading...        
                </p>    
                <select wire:model="selectedService" id="selectedService" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 cursor-pointer">
                    <option value="-1">Select Service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                    @endforeach
                </select>
            </div>
        
            <!-- Time selection fields -->
            <div class="flex flex-col mb-5">
                <h3 class="inline-block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Business Hours
                </h3>    
                <div class="flex space-x-5">
                    <select wire:model="selectedTimeFrom" id="selectedTimeFrom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 cursor-pointer">
                        <option value="-1">From</option>
                        @for ($i=1; $i<=12; $i++)
                            <option value="{{ $i }}">{{ $i }} am</option>
                        @endfor
                    </select>
            
                    <select wire:model="selectedTimeTo" id="selectedTimeTo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 cursor-pointer">
                        <option value="-1">To</option>
                        @for ($i=1; $i<=12; $i++)
                            <option value="{{ $i }}">{{ $i }} pm</option>
                        @endfor
                    </select>
                </div>
            </div>
            
        
            <div class="mb-5">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Price (per Hour)
                </label>
                <input type="number" step="0.01" wire:model.live="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" @error('price') border-red-500  @enderror" placeholder="Rs. xxxx">
                @error('price')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
        
            <div class="mb-5">
                <label for="ServiceDescription" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    ServiceDescription
                </label>
                <textarea type="text" wire:model.live="serviceDescription" id="ServiceDescription" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" @error('serviceDescription') border-red-500  @enderror" placeholder="Service Description"></textarea>
                @error('serviceDescription')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
        
            <!-- Form submission button -->
            <button type="submit" class="bg-blue-700 text-white py-2 px-4 rounded-md w-full">
                Update
            </button>
        </form>
    </div>        
    {{-- @endsection --}}
</div>
