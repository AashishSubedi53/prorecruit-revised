@extends('layouts.users.app')

@section('title')
  @auth
  Welcome, {{auth()->user()->username}}
  @endauth
@endsection

@section('content')
@push('script')
  @vite('resources/js/app.js')
@endpush

<!-- <section class="m-10 flex flex-col">
  <div id="top" class="flex flex-row space-x-5 p-10">
    <div class="w-1/2 mx-auto shadow-lg border border-gray-300 bg-slate-200 rounded-lg hover:shadow-xl active:bg-gray-300">
        <a href="{{route('professional.my-bookings.index')}}" class="flex flex-col items-center">
            <div class="w-1/2 h-1/2 mx-auto my-auto py-2 px-5">
                <img src="{{asset('build/assets/icons/booking.png')}}" alt="">
            </div>
            <p class="font-semibold text-[20px] mt-1">My Bookings</p>
        </a>
    </div>

    <div class="w-1/2 mx-auto shadow-lg border border-gray-300 bg-slate-200 rounded-lg hover:shadow-xl active:bg-gray-300">
        <a href="{{route('professional.my-orders.index')}}" class="flex flex-col items-center">
            <div class="w-1/2 h-1/2 mx-auto my-auto py-2 px-5">
                <img src="{{asset('build/assets/icons/orders.png')}}" alt="">
            </div>
            <p class="font-semibold text-[20px] mt-2">My Orders</p>
        </a>
    </div>

    <div class="w-1/2 mx-auto shadow-lg border border-gray-300 bg-slate-200 rounded-lg hover:shadow-xl active:bg-gray-300">
        <a href="{{route('professional.my-services.index')}}" class="flex flex-col items-center p-5">
            <div class="w-1/2 h-1/2 mx-auto my-auto py-2 px-5">
                <img src="{{asset('build/assets/icons/services.png')}}" alt="">
            </div>
            <p class="font-semibold text-[20px] mt-2">My Services</p>
        </a>
    </div>
  </div>

  <div id="below" class="flex flex-row space-x-5 w-4/6 mx-auto p-10 ">
    <div class="w-1/2 mx-auto shadow-lg border border-gray-300 bg-slate-200 rounded-lg hover:shadow-xl active:bg-gray-300">
        <a href="" class="flex flex-col items-center">
            <div class="w-1/2 h-1/2 mx-auto my-auto py-2 px-5">
                <img src="{{asset('build/assets/icons/message.png')}}" alt="">
            </div>
            <p class="font-semibold text-[20px] p-5">My Messages</p>
        </a>
    </div>

    <div class="w-1/2 mx-auto shadow-lg border border-gray-300 bg-slate-200 rounded-lg hover:shadow-xl active:bg-gray-300">
        <a href="{{route('professional.gallery.index')}}" class="flex flex-col items-center">
            <div class="w-1/2 h-1/2 mx-auto my-auto py-2 px-5">
                <img src="{{asset('build/assets/icons/gallery.png')}}" alt="">
            </div>
            <p class="font-semibold text-[20px] p-5">Gallery</p>
        </a>
    </div>
  </div>

  
</section> -->

<section class="m-10 grid grid-cols-3 gap-5 w-1/2 mx-auto items-center">
  {{-- <div class="shadow-lg border border-gray-300 bg-slate-200 rounded-lg hover:shadow-xl active:bg-gray-300 py-5">
    <a href="{{route('professional.my-bookings.index')}}" class="flex flex-col items-center">
      <div class="w-20 h-24">
        <img src="{{asset('storage/icons/booking.png')}}" alt="">
      </div>
      <p class="font-semibold text-[16px]">My Bookings</p>
    </a>
  </div> --}}

  <div class="shadow-lg border border-gray-300 bg-slate-200 rounded-lg hover:shadow-xl active:bg-gray-300 py-3">
    <a href="{{route('professional.my-orders.index')}}" class="flex flex-col items-center">
      <div class="w-20 h-24 mt-3">
        <img src="{{asset('storage/icons/orders.png')}}" alt="">
      </div>
      <p class="font-semibold text-[16px]">My Orders</p>
    </a>
  </div>

  <div class="shadow-lg border border-gray-300 bg-slate-200 rounded-lg hover:shadow-xl active:bg-gray-300 py-5">
    <a href="{{route('professional.my-services.index')}}" class="flex flex-col items-center">
      <div class="w-20 h-24">
        <img src="{{asset('storage/icons/services.png')}}" alt="">
      </div>
      <p class="font-semibold text-[16px]">My Services</p>
    </a>
  </div>

  <div class="shadow-lg border border-gray-300 bg-slate-200 rounded-lg hover:shadow-xl active:bg-gray-300 py-5">
    <a href="" class="flex flex-col items-center">
      <div class="w-20 h-24">
        <img src="{{asset('storage/icons/message.png')}}" alt="">
      </div>
      <p class="font-semibold text-[16px]">My Messages</p>
    </a>
  </div>

  <div class="shadow-lg border border-gray-300 bg-slate-200 rounded-lg hover:shadow-xl active:bg-gray-300 py-5">
    <a href="{{route('professional.gallery.index')}}" class="flex flex-col items-center">
      <div class="w-20 h-24">
        <img src="{{asset('storage/icons/gallery.png')}}" alt="">
      </div>
      <p class="font-semibold text-[16px]">Gallery</p>
    </a>
  </div>
</section>
  
@endsection