<x-app-layout>
    <x-slot name="header">
        Site Settings
    </x-slot>

    @if($message = Session::get('success'))
    <div class="mb-4 inline-flex overflow-hidden w-full bg-white rounded-lg shadow-md" id="success-message">
        <div class="flex justify-center items-center w-12 bg-blue-500">
            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
            </svg>
        </div>

        <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
                <span class="font-semibold text-blue-500">Info</span>
                <p class="text-sm font-semibold text-gray-600">{{$message}}</p>
            </div>
        </div>
    </div>
    @endif

    <script>
      setTimeout(function() {
          document.getElementById('success-message').style.display = 'none';
      }, 5000);
    </script>

    <div class="max-w-lg">
        <form action="{{ route('admin.settings.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-5">
                <label for="phonenumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                <input type="text" name="phonenumber" value="{{ $siteSettings->phonenumber ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                <input type="text" name="address" value="{{ $siteSettings->address ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="text" name="email" value="{{ $siteSettings->email ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="instagram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram</label>
                <input type="text" name="instagram" value="{{ $siteSettings->instagram ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="tiktok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiktok</label>
                <input type="text" name="tiktok" value="{{ $siteSettings->tiktok ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <x-input-error :messages="$errors->get('tiktok')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="facebook" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook</label>
                <input type="text" name="facebook" value="{{ $siteSettings->facebook ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
            </div>

            {{-- <div class="mb-5">
                <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Payment Modes</h3>
                <ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="vue-checkbox" type="checkbox" name="payment_modes[]" value="Esewa" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="vue-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Esewa</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="react-checkbox" type="checkbox" name="payment_modes[]" value="Khalti" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="react-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Khalti</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="angular-checkbox" type="checkbox" name="payment_modes[]" value="Cash in hand" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="angular-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cash in hand</label>
                        </div>
                    </li>
                </ul>
                <x-input-error :messages="$errors->get('payment_modes')" class="mt-2" />
            </div> --}}

            <div class="mb-5">
                <label for="copyright" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Copyright Message</label>
                <input type="text" name="copyright" value="{{ $siteSettings->copyright ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <x-input-error :messages="$errors->get('copyright')" class="mt-2" />
            </div>

            <div class="max-w-full mb-5">
                <label for="about_us_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">About Us description</label>
                <textarea id="about_us_description" name="about_us_description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment...">{{ $siteSettings->about_us_description ?? '' }}</textarea>
                <x-input-error :messages="$errors->get('about_us_description')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current About Us Image</label>
                @if($siteSettings->about_us_image)
                    <img src="{{ asset('storage/' . $siteSettings->about_us_image) }}" alt="Current about-us Image" class="mb-2 rounded-lg">
                @else
                    <p>No images available</p>
                @endif
            </div>

            <div class="max-w-full mb-5">
                <label for="about_us_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New About Us Image</label>
                <input id="about_us_image" name="about_us_image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" type="file">
                <x-input-error :messages="$errors->get('about_us_image')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Logo</label>
                @if($siteSettings->logo)
                    <img src="{{ asset('storage/' . $siteSettings->logo) }}" alt="Current logo Image" class="mb-2 rounded-lg">
                @else
                    <p>No images available</p>
                @endif
            </div>

            <div class="max-w-full mb-5">
                <label for="logo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Logo</label>
                <input id="logo" name="logo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" type="file">
                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current homepage banner</label>
                @if($siteSettings->homepage_banner)
                    <img src="{{ asset('storage/' . $siteSettings->homepage_banner) }}" alt="Current homepage banner Image" class="mb-2 rounded-lg">
                @else
                    <p>No images available</p>
                @endif
            </div>

            <div class="max-w-full mb-5">
                <label for="homepage_banner" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Homepage Banner</label>
                <input id="homepage_banner" name="homepage_banner" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" type="file">
                <x-input-error :messages="$errors->get('homepage_banner')" class="mt-2" />
            </div>

            <button type="submit" class="text-white py-2 px-8 rounded-md bg-slate-800">Save</button>
        </form>
    </div>
</x-app-layout>
