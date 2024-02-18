<x-app-layout>
    <x-slot name="header">
        Site Settings
    </x-slot>

    <div class="max-w-lg mx-auto">
    <div class="mb-5">
      <label for="phonenumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
      <input type="text" value="987654321" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-5">
      <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
      <input type="text" value="Pokhara" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-5">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
      <input type="text" value="prorecruit@mail.com" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-5">
      <label for="instagram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram</label>
      <input type="text" value="https://www.instagram.com/" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-5">
      <label for="tiktok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiktok</label>
      <input type="text" value="https://www.tiktok.com" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-5">
      <label for="facebook" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook</label>
      <input type="text" value="https://www.facebook.com" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <!-- payment modes -->

  <div class="mb-5">
    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Payment Modes</h3>
    <ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
            <div class="flex items-center ps-3">
                <input id="vue-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                <label for="vue-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Esewa</label>
            </div>
        </li>
        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
            <div class="flex items-center ps-3">
                <input id="react-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                <label for="react-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Khalti</label>
            </div>
        </li>
        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
            <div class="flex items-center ps-3">
                <input id="angular-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                <label for="angular-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cash in hand</label>
            </div>
        </li>
        
    </ul>
  </div>
    <div class="mb-5">
      <label for="copyright" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Copyright Message</label>
      <input type="text" value="© 2023. All rights reserved. Designed by John." id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <form class="max-w-full mb-5">
      <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">About Us description</label>
      <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment...">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure accusantium necessitatibus optio. Veniam iusto officiis mollitia voluptates, quam et pariatur nisi corrupti magnam repellendus reprehenderit rem impedit vitae perferendis at!</textarea>
    </form>

    <form class="max-w-full mb-5">
      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="homepage_banner">About Us Image</label>
      <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
    </form>

    <form class="max-w-full mb-5">
      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="logo">Logo</label>
      <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
    </form>

    <form class="max-w-full mb-5">
      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="homepage_banner">Homepage Banner</label>
      <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
    </form>

    <button class="text-white py-2 px-8 rounded-md bg-slate-800">Save</button>
    </div>
</x-app-layout>
