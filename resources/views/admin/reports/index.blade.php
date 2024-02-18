<x-app-layout>
    <x-slot name="header">
        Generate Report
    </x-slot>    
  <form class="max-w-md mb-5">
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
</x-app-layout>
