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

    @if($orders->isEmpty())
    <div class="mt-10 mb-24 p-24">
      <p class="text-center font-semibold text-xl">There are no bookings made currently !</p>
    </div>
    @else
      @foreach ($orders as $order)
          
      <div class="flex flex-row justify-between w-3/4 mx-auto bg-gray-100 mt-10 mb-10 rounded-lg shadow-lg">
        <div id="left" class="flex flex-row justify-around p-4">
          <div class="w-60 h-60 pt-2">
            <img src="{{asset('storage/' . $order->professionalService->service->image)}}" alt="animation image">
          </div>
          <div id="details" class="p-2 flex flex-col space-y-2">
            <h2 class="text-2xl font-semibold mb-5 pt-1">{{($order->professionalService->service->service_name)}}</h2>
            <p class="flex flex-row items-center"><span class="mr-2"><img src="{{asset('storage/icons/calendar.png')}}" alt="" height="20px" width="20px"></span><span>{{$order->bookingDate}}</span> </p>
            <p class="flex flex-row items-center"><span class="mr-2"><img src="{{asset('storage/icons/ph_clock-bold.png')}}" alt="" height="20px" width="20px"></span>{{$order->bookingTime}}</p>
            <p><span class="font-semibold">Payment Method:</span> {{$order->payment->payment_method}}</p>
            <p><span class="font-semibold">Booked on:</span> {{$order->payment->created_at->format('Y-M-d')}}</p>
            
          </div>
        </div>
      
        <div id="right" class="p-2">
          <div id="top" class="p-2 flex justify-between">
            <button wire:click="professionalProfile({{$order->professionalService->professional_id}})" class="text-white bg-green-500 rounded-md py-2 px-4">
              Leave Review
            </button>
      
            <button 
            wire:click="professional_id = {{$order->professional_id}}"
            x-data="" x-on:click.prevent="$dispatch('open-modal', 'send-message')" class="text-white bg-blue-500 rounded-md py-2 px-4">
              Send Message
            </button>
            {{-- <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            >{{ __('Delete Account') }}</x-danger-button> --}}
  
          </div>
          <div class="p-2 flex flex-col space-y-3">
            <p class="py-2 px-4 bg-black text-white"><span class="font-semibold">Total Price:</span> Rs.{{($order->payment->payment_amount)/100}}</p>
            <p class="py-2 px-4 bg-gray-300"><span class="font-semibold">Payment Status:</span> {{$order->payment->payment_status}}</p>
            <p class="py-2 px-4 bg-gray-300"><span class="font-semibold">Service Status:</span> {{$order->order_status}}</p>
            <button wire:click="cancelBooking({{ $order->id }})" type="button" class="py-2 px-4 bg-red-700 text-white">Cancel booking</button>
          </div>
        </div>
      </div>
      @endforeach
      @endif
      <x-modal name="send-message" :show="$errors->first()" focusable>
        <form>
         <div class="p-2">
          <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Write your message</label>
          <textarea id="message" wire:model="message" rows="4" 
          class="block p-2.5  w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
          placeholder="Write your message here...">
          </textarea>
          <button wire:click="sendMessage" type="button" class="mt-4 !bg-blue-700 !p-2 text-white rounded-md">Send</button>
        </div>
        </form>
     </x-modal>
</div>
