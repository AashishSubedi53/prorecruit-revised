@extends('layouts.users.app')

@section('title')
  My Bookings
@endsection

@section('content')

<div class="flex flex-row justify-between w-3/4 mx-auto bg-gray-100 mt-10 mb-10 rounded-lg shadow-lg">
  <div id="left" class="flex flex-row justify-around">
    <div class="w-80 h-80">
      <img src="{{asset('build/assets/images/Animation.png')}}" alt="animation image">
    </div>
    <div id="details" class="p-2 flex flex-col">
      <h2 class="text-2xl font-semibold mb-5">Animation</h2>
      <p>2024-01-01 - 1pm</p>
      <p><span class="font-semibold">Booking Id:</span> 100</p>
      <p><span class="font-semibold">Payment Method:</span> Esewa</p>
    </div>
  </div>

  <div id="right" class="p-2">
    <div id="top" class="p-2 flex justify-between">
      <button class="text-white bg-green-500 rounded-md py-2 px-4">
        Leave Review
      </button>

      <button class="text-white bg-blue-500 rounded-md py-2 px-4">
        Send Message
      </button>
    </div>
    <div class="p-2 flex flex-col space-y-3">
      <p class="py-2 rounded-md px-4 bg-black text-white"><span class="font-semibold">Total Price:</span> Rs.500</p>
      <p class="py-2 rounded-md px-4 bg-gray-300"><span class="font-semibold">Payment Status:</span> Paid</p>
      <p class="py-2 rounded-md px-4 bg-gray-300"><span class="font-semibold">Service Status:</span> Awaiting Completion</p>
    </div>
  </div>
</div>
<div class="flex flex-row justify-between w-3/4 mx-auto bg-gray-100 mt-10 mb-10 rounded-lg shadow-lg">
  <div id="left" class="flex flex-row justify-around">
    <div class="w-80 h-80">
      <img src="{{asset('build/assets/images/Animation.png')}}" alt="animation image">
    </div>
    <div id="details" class="p-2 flex flex-col">
      <h2 class="text-2xl font-semibold mb-5">Animation</h2>
      <p>2024-01-01 - 1pm</p>
      <p><span class="font-semibold">Booking Id:</span> 100</p>
      <p><span class="font-semibold">Payment Method:</span> Esewa</p>
    </div>
  </div>

  <div id="right" class="p-2">
    <div id="top" class="p-2 flex justify-between">
      <button class="text-white bg-green-500 rounded-md py-2 px-4">
        Leave Review
      </button>

      <button class="text-white bg-blue-500 rounded-md py-2 px-4">
        Send Message
      </button>
    </div>
    <div class="p-2 flex flex-col space-y-3">
      <p class="py-2 px-4 bg-black text-white"><span class="font-semibold">Total Price:</span> Rs.500</p>
      <p class="py-2 px-4 bg-gray-300"><span class="font-semibold">Payment Status:</span> Paid</p>
      <p class="py-2 px-4 bg-gray-300"><span class="font-semibold">Service Status:</span> Awaiting Completion</p>
    </div>
  </div>
</div>

@endsection