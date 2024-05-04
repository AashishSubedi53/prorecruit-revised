@push('script')
  @vite('resources/js/flowbite.js')
@endpush
<div>
  @if($message = Session::get('success'))
    <div class="fixed top-0 pt-4 w-full pointer-events-none" id="success-message">
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
    <script>
        // Hide success message after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 5000);
    </script>
    @endif
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
            <p><span class="font-semibold">Booked on:</span> {{$order->payment->created_at}}</p>
            
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
