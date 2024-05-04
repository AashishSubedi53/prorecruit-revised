@extends('layouts.users.app')
@section('title')
  My Orders
@endsection

@section('content')
@push('script')
  @vite('resources/js/flowbite.js')
@endpush


{{-- <div class="relative overflow-x-auto mb-10 p-10">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Order Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Service Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Booking Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Booking Time
                </th>
                <th scope="col" class="px-6 py-3">
                    Booking Details
                </th>
                <th scope="col" class="px-6 py-3">
                    Customer
                </th>
                <th scope="col" class="px-6 py-3">
                    Customer Email
                </th>
                
                <th scope="col" class="px-6 py-3">
                    Phone Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Amount
                </th>
                <th scope="col" class="px-6 py-3">
                    Payment Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Order Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>

            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    1
                </th>
                <td class="px-6 py-4">
                    Animation
                </td>
                <td class="px-6 py-4">
                    2024-01-01
                </td>
                <td class="px-6 py-4">
                    5pm
                </td>
                <td class="px-6 py-4">
                    details...
                </td>
                <td class="px-6 py-4">
                    Ram 
                </td>
                <td class="px-6 py-4">
                    ram@gmail.com
                </td>
                <td class="px-6 py-4">
                    987654321
                </td>
                <td class="px-6 py-4">
                    500
                </td>
                <td class="px-6 py-4">
                    Paid
                </td>
                <td class="px-6 py-4">
                    Completed
                </td>
                <td>
                  <div class="flex flex-row gap-1 p-2">                    
                    <a href="#" class="text-white bg-blue-700 rounded px-4 p-2">Edit</a>
                    <form action="#" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="text-white bg-rose-700 rounded p-2">Delete</button>
                    </form>
                  </div>
                </td>
            </tr>            
        </tbody>
    </table>
</div> --}}

<div class="relative overflow-x-auto mb-10 p-10">
    @livewire('my-orders')
</div>

  
@endsection