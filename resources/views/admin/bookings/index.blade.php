<x-app-layout>
    <x-slot name="header">
        Booking History
    </x-slot>

    <!-- <div class="mb-4 inline-flex overflow-hidden w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-12 bg-blue-500">
            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
            </svg>
        </div>

        <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
                <span class="font-semibold text-blue-500">Info</span>
                <p class="text-sm font-semibold text-gray-600">user added successfully !</p>
            </div>
        </div>
    </div> -->


    <!-- search -->
    
    <form class="w-1/3 mb-5">   
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search anything..." required>
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-700">Search</button>
        </div>
    </form>


   <!-- table -->   
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Order Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Professional Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Customer Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Customer PhoneNo.
                </th>
                <th scope="col" class="px-6 py-3">
                    Customer Email
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
                    Address
                </th>
                <th scope="col" class="px-6 py-3">
                    Payment Mode
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
                    Metro Plumbers
                </td>
                <td class="px-6 py-4">
                    Ram Bahadur
                </td>
                <td class="px-6 py-4">
                    987654321
                </td>
                <td class="px-6 py-4">
                    ram123@gmail.com
                </td>
                <td class="px-6 py-4">
                    Plumbing 
                </td>
                <td class="px-6 py-4">
                    2023-01-01
                </td>
                <td class="px-6 py-4">
                    4pm
                </td>
                <td class="px-6 py-4">
                    Pokhara-01
                </td>
                <td class="px-6 py-4">
                    Esewa
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
                    <a href="#" class="text-white bg-blue-950 rounded px-4 p-2">Edit</a>
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
</div>


</x-app-layout>
