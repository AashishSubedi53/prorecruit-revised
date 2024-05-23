@extends('layouts.users.app')

@section('content')
@push('script')
  @vite('resources/js/flowbite.js')
@endpush

<div class="bg-blue-700 p-4">
  <h1 class="text-white text-xl text-center font-semibold">My messages</h1>
</div>

<div class="relative overflow-x-auto container mx-auto mb-20 p-10">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Customer Id
              </th>
              <th scope="col" class="px-6 py-3">
                  Full name
              </th>
              <th scope="col" class="px-6 py-3">
                  Username
              </th>
              <th scope="col" class="px-6 py-3">
                  Message
              </th>
          </tr>
      </thead>
      <tbody>
          @foreach ($messages as $message )                    
          
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td scope="row" class="px-6 py-4">
                {{$message->sender->id}}
            </td>
              <td scope="row" class="px-6 py-4">
                  {{$message->sender->first_name}} {{$message->sender->last_name}}
              </td>
                
              <td class="px-6 py-4">
                  {{$message->sender->user->username}}
              </td>
              <td class="px-6 py-4">
                  {{$message->message}}
              </td>
              
              
          </tr>
          @endforeach
      </tbody>
  </table>
</div> 


@endsection