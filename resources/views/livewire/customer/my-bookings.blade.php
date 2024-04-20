<div>
      @foreach ($orders as $order)
          
      <div class="flex flex-row justify-between w-3/4 mx-auto bg-gray-100 mt-10 mb-10 rounded-lg shadow-lg">
        <div id="left" class="flex flex-row justify-around">
          <div class="w-60 h-60 pt-2">
            <img src="{{asset('storage/' . $order->professionalService->service->image)}}" alt="animation image">
          </div>
          <div id="details" class="p-2 flex flex-col space-y-2">
            <h2 class="text-2xl font-semibold mb-5 pt-1">{{($order->professionalService->service->service_name)}}</h2>
            <p class="flex flex-row items-center"><span class="mr-2"><img src="{{asset('storage/icons/calendar.png')}}" alt="" height="20px" width="20px"></span><span>{{$order->bookingDate}}</span> </p>
            <p class="flex flex-row items-center"><span class="mr-2"><img src="{{asset('storage/icons/ph_clock-bold.png')}}" alt="" height="20px" width="20px"></span>{{$order->bookingTime}}</p>
            <p><span class="font-semibold">Payment Method:</span> {{$order->payment->payment_method}}</p>
          </div>
        </div>
      
        <div id="right" class="p-2">
          <div id="top" class="p-2 flex justify-between">
            <button wire:click="professionalProfile({{$order->professionalService->professional_id}})" class="text-white bg-green-500 rounded-md py-2 px-4">
              Leave Review
            </button>
      
            <button class="text-white bg-blue-500 rounded-md py-2 px-4">
              Send Message
            </button>
          </div>
          <div class="p-2 flex flex-col space-y-3">
            <p class="py-2 px-4 bg-black text-white"><span class="font-semibold">Total Price:</span> Rs.{{($order->payment->payment_amount)/100}}</p>
            <p class="py-2 px-4 bg-gray-300"><span class="font-semibold">Payment Status:</span> {{$order->payment->payment_status}}</p>
            <p class="py-2 px-4 bg-gray-300"><span class="font-semibold">Service Status:</span> {{$order->order_status}}</p>
          </div>
        </div>
      </div>
      @endforeach
</div>
