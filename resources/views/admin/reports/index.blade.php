{{-- <x-app-layout>
    <x-slot name="header">
        Generate Report
    </x-slot>    
  <form class="max-w-md mb-5" action="{{route('generate.bookings.report')}}" method="POST">
    @csrf
    <label for="report" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select report</label>
    <select id="report" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

      <option>Bookings</option>
      <option>Payment Modes</option>
      <option>Customers</option>
      <option>Professionals</option>
    </select>
  </form>
  <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Date</label>
    <form id="date" action="" class="max-w-md mb-5 flex flex-row justify-between">
      <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <span class="mx-4 text-2xl font-medium text-gray-700">To</span>
      <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </form>
  <button class="text-white py-2 px-8 rounded bg-slate-800">Generate</button>
</x-app-layout> --}}

<x-app-layout>
  <x-slot name="header">
      Generate Report
  </x-slot>

  @if(session('success')) 
  <div class="mb-4 inline-flex overflow-hidden w-full bg-white rounded-lg shadow-md" id="success-message">
      <div class="flex justify-center items-center w-12 bg-blue-500">
          <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
              <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
          </svg>
      </div>

      <div class="px-4 py-2 -mx-3">
          <div class="mx-3">
              <span class="font-semibold text-blue-500">Info</span>
              <p class="text-sm font-semibold text-gray-600">{{session('success')}}</p>
          </div>
      </div>
  </div>
  @endif
  <script>
    setTimeout(function() {
        document.getElementById('success-message').style.display = 'none';
    }, 5000);
</script>

  <form class="max-w-md mb-5" action="{{ route('generate.bookings.report') }}" method="get">
      
      <label for="report" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select report</label>
      <select id="report" name="report" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option value="bookings">Bookings</option>
          <option value="customers">Customers data</option>
          <option value="professionals">Professionals data</option>
      </select>

      <label for="start_date" class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Start Date</label>
      <input type="date" id="start_date" name="start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

      <label for="end_date" class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">Select End Date</label>
      <input type="date" id="end_date" name="end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

      <button type="submit" class="mt-6 text-white py-2 px-8 rounded bg-slate-800">Generate</button>
  </form>
</x-app-layout>
