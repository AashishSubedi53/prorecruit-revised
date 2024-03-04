<div>
    {{-- @section('content') --}}
    <div class="flex flex-col space-y-3 w-1/2 p-5"> 
        <!-- Service categories select menu... -->
        <form wire:submit.prevent="submit">
            <div>
                <label for="selectedCategory">Select Service Category</label>
                <select wire:model="selectedCategory" wire:change="changeCategory" id="selectedCategory" class="cursor-pointer w-full">
                    <option value="-1">Select Category</option>
                    @foreach ($categories as $serviceCategory)
                        <option value="{{ $serviceCategory->id }}">{{ $serviceCategory->category_name }}</option>
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
                        <option value="{{ $service->id }}">{{ $service->service_name }}</option>
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
    {{-- @endsection --}}
</div>
