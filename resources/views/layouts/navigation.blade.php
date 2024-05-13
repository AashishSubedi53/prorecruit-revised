<div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
     class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-8">
        <div class="flex items-center">
            <!-- <svg class="h-12 w-12" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z" fill="#4C51BF" stroke="#4C51BF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z" fill="white"/>
            </svg> -->

            <span class="text-[#FF8A00] text-2xl font-semibold">Pro</span> <span class="text-white text-2xl font-semibold">Recruit</span>
            
        </div>
    </div>

    <nav class="mt-10" x-data="{ isMultiLevelMenuOpen: false }">
        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            <x-slot name="icon">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                </svg>
            </x-slot>
            {{ __('Dashboard') }}
        </x-nav-link>

        <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
            <x-slot name="icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </x-slot>
            {{ __('Users') }}
        </x-nav-link>

        <x-nav-link href="{{ route('admin.customers.index') }}" :active="request()->routeIs('admin.customers.index')">
            <x-slot name="icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </x-slot>
            Customers
        </x-nav-link>

        <x-nav-link href="{{ route('admin.professionals.index') }}" :active="request()->routeIs('admin.professionals.index')">
            <x-slot name="icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </x-slot>
            Professionals
        </x-nav-link>

        <x-nav-link href="{{ route('admin.serviceCategories.index') }}" :active="request()->routeIs('admin.serviceCategories.index')">
            <x-slot name="icon">
                {{-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg> --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 32 32"><path fill="currentColor" d="M21.5 2.5v1.406a5.643 5.643 0 0 0-2.28.938l-1.032-.97l-1.375 1.47l1 .937a5.658 5.658 0 0 0-.907 2.22H15.5v2h1.406c.146.83.474 1.586.938 2.25l-1.063 1.03l1.44 1.44l1.03-1.064c.664.464 1.42.792 2.25.938V16.5h2v-1.406a5.657 5.657 0 0 0 2.22-.906l.936 1l1.47-1.376l-.97-1.03c.47-.67.79-1.445.938-2.282H29.5v-2h-1.406a5.609 5.609 0 0 0-.938-2.25l.938-.938l-1.407-1.406l-.937.938a5.609 5.609 0 0 0-2.25-.938V2.5zm1 3.313A3.664 3.664 0 0 1 26.188 9.5c0 2.055-1.633 3.688-3.688 3.688s-3.688-1.633-3.688-3.688s1.633-3.688 3.688-3.688zM9.53 11.718l-1.842.75l.718 1.81a6.937 6.937 0 0 0-2.344 2.314l-1.78-.72l-.75 1.845l1.78.718a6.796 6.796 0 0 0-.218 1.656c0 .57.085 1.126.218 1.656l-1.78.72l.75 1.843l1.78-.72a6.893 6.893 0 0 0 2.344 2.345l-.72 1.78l1.845.75l.72-1.78a6.76 6.76 0 0 0 1.656.218c.57 0 1.128-.085 1.656-.218l.72 1.78l1.843-.75l-.72-1.78a6.91 6.91 0 0 0 2.314-2.344l1.81.718l.75-1.843l-1.81-.72c.13-.53.218-1.087.218-1.656c0-.57-.087-1.128-.22-1.657l1.813-.718l-.75-1.845l-1.81.72a6.893 6.893 0 0 0-2.314-2.314l.72-1.81l-1.845-.75l-.717 1.81a6.86 6.86 0 0 0-1.657-.217c-.57 0-1.126.086-1.656.218l-.72-1.81zm2.376 3.592c2.663 0 4.78 2.12 4.78 4.782c.002 2.663-2.117 4.812-4.78 4.812a4.806 4.806 0 0 1-4.812-4.812c0-2.663 2.15-4.782 4.812-4.782"/></svg>
            </x-slot>
            Service Category
        </x-nav-link>

        <x-nav-link href="{{ route('admin.services.index') }}" :active="request()->routeIs('admin.services.index')">
            <x-slot name="icon">
                {{-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg> --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 32 32"><path fill="currentColor" d="M21.5 2.5v1.406a5.643 5.643 0 0 0-2.28.938l-1.032-.97l-1.375 1.47l1 .937a5.658 5.658 0 0 0-.907 2.22H15.5v2h1.406c.146.83.474 1.586.938 2.25l-1.063 1.03l1.44 1.44l1.03-1.064c.664.464 1.42.792 2.25.938V16.5h2v-1.406a5.657 5.657 0 0 0 2.22-.906l.936 1l1.47-1.376l-.97-1.03c.47-.67.79-1.445.938-2.282H29.5v-2h-1.406a5.609 5.609 0 0 0-.938-2.25l.938-.938l-1.407-1.406l-.937.938a5.609 5.609 0 0 0-2.25-.938V2.5zm1 3.313A3.664 3.664 0 0 1 26.188 9.5c0 2.055-1.633 3.688-3.688 3.688s-3.688-1.633-3.688-3.688s1.633-3.688 3.688-3.688zM9.53 11.718l-1.842.75l.718 1.81a6.937 6.937 0 0 0-2.344 2.314l-1.78-.72l-.75 1.845l1.78.718a6.796 6.796 0 0 0-.218 1.656c0 .57.085 1.126.218 1.656l-1.78.72l.75 1.843l1.78-.72a6.893 6.893 0 0 0 2.344 2.345l-.72 1.78l1.845.75l.72-1.78a6.76 6.76 0 0 0 1.656.218c.57 0 1.128-.085 1.656-.218l.72 1.78l1.843-.75l-.72-1.78a6.91 6.91 0 0 0 2.314-2.344l1.81.718l.75-1.843l-1.81-.72c.13-.53.218-1.087.218-1.656c0-.57-.087-1.128-.22-1.657l1.813-.718l-.75-1.845l-1.81.72a6.893 6.893 0 0 0-2.314-2.314l.72-1.81l-1.845-.75l-.717 1.81a6.86 6.86 0 0 0-1.657-.217c-.57 0-1.126.086-1.656.218l-.72-1.81zm2.376 3.592c2.663 0 4.78 2.12 4.78 4.782c.002 2.663-2.117 4.812-4.78 4.812a4.806 4.806 0 0 1-4.812-4.812c0-2.663 2.15-4.782 4.812-4.782"/></svg>
            </x-slot>
            Services
        </x-nav-link>
        <x-nav-link href="{{ route('admin.bookings.index') }}" :active="request()->routeIs('admin.bookings.index')">
            <x-slot name="icon">
                {{-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg> --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" d="M7.25 7A.75.75 0 0 1 8 6.25h8a.75.75 0 0 1 0 1.5H8A.75.75 0 0 1 7.25 7M8 9.75a.75.75 0 0 0 0 1.5h5a.75.75 0 0 0 0-1.5z"/><path fill="currentColor" fill-rule="evenodd" d="M9.945 1.25c-1.367 0-2.47 0-3.337.117c-.9.12-1.658.38-2.26.981c-.602.602-.86 1.36-.981 2.26c-.117.867-.117 1.97-.117 3.337v8.11c0 1.367 0 2.47.117 3.337c.12.9.38 1.658.981 2.26c.602.602 1.36.86 2.26.982c.867.116 1.97.116 3.337.116h4.11c1.367 0 2.47 0 3.337-.116c.9-.122 1.658-.38 2.26-.982c.602-.602.86-1.36.982-2.26c.116-.867.116-1.97.116-3.337v-8.11c0-1.367 0-2.47-.116-3.337c-.122-.9-.38-1.658-.982-2.26c-.602-.602-1.36-.86-2.26-.981c-.867-.117-1.97-.117-3.337-.117zM5.41 3.409c.277-.277.665-.457 1.4-.556c.754-.101 1.756-.103 3.191-.103h4c1.435 0 2.436.002 3.192.103c.734.099 1.122.28 1.399.556c.277.277.457.665.556 1.4c.101.754.103 1.756.103 3.191v7.25H7.782c-.818 0-1.376 0-1.855.128a3.748 3.748 0 0 0-1.177.548V8c0-1.435.002-2.437.103-3.192c.099-.734.28-1.122.556-1.399m-.632 14.84c.015.354.039.665.076.943c.099.734.28 1.122.556 1.399c.277.277.665.457 1.4.556c.754.101 1.756.103 3.191.103h4c1.435 0 2.436-.002 3.192-.103c.734-.099 1.122-.28 1.399-.556c.277-.277.457-.665.556-1.4c.083-.615.099-1.395.102-2.441H7.898c-.978 0-1.32.006-1.583.077a2.25 2.25 0 0 0-1.538 1.422" clip-rule="evenodd"/></svg>
            </x-slot>
            Booking History
        </x-nav-link>

        <x-nav-link href="{{ route('admin.settings.edit')}}" :active="request()->routeIs('admin.settings.edit')">
            <x-slot name="icon">
                {{-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg> --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M9.024 2.783A1 1 0 0 1 10 2h4a1 1 0 0 1 .976.783l.44 1.981c.4.19.781.41 1.14.66l1.938-.61a1 1 0 0 1 1.166.454l2 3.464a1 1 0 0 1-.19 1.237l-1.497 1.373a8.1 8.1 0 0 1 0 1.316l1.497 1.373a1 1 0 0 1 .19 1.237l-2 3.464a1 1 0 0 1-1.166.454l-1.937-.61c-.36.25-.741.47-1.14.66l-.44 1.98A1 1 0 0 1 14 22h-4a1 1 0 0 1-.976-.783l-.44-1.981c-.4-.19-.781-.41-1.14-.66l-1.938.61a1 1 0 0 1-1.166-.454l-2-3.464a1 1 0 0 1 .19-1.237l1.497-1.373a8.097 8.097 0 0 1 0-1.316L2.53 9.97a1 1 0 0 1-.19-1.237l2-3.464a1 1 0 0 1 1.166-.454l1.937.61c.36-.25.741-.47 1.14-.66l.44-1.98zM12 15a3 3 0 1 0 0-6a3 3 0 0 0 0 6" clip-rule="evenodd"/></svg>
            </x-slot>
            Site Settings
        </x-nav-link>

        <x-nav-link href="{{route('admin.testimonials.index')}}" :active="request()->routeIs('admin.testimonials.index')">
            <x-slot name="icon">
                {{-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg> --}}

                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"><path fill="currentColor" d="M4 3h12c.55 0 1.02.2 1.41.59S18 4.45 18 5v7c0 .55-.2 1.02-.59 1.41S16.55 14 16 14h-1l-5 5v-5H4c-.55 0-1.02-.2-1.41-.59S2 12.55 2 12V5c0-.55.2-1.02.59-1.41S3.45 3 4 3m11 2H4v1h11zm1 3H4v1h12zm-3 3H4v1h9z"/></svg>
            </x-slot>
            Testimonials
        </x-nav-link>

        <x-nav-link href="{{ route('admin.reports.index') }}" :active="request()->routeIs('admin.reports.index')">
            <x-slot name="icon">
                {{-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg> --}}

                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 32 32"><g fill="currentColor"><path d="M25 5h-.17v2H25a1 1 0 0 1 1 1v20a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h.17V5H7a3 3 0 0 0-3 3v20a3 3 0 0 0 3 3h18a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3"/><path d="M23 3h-3V0h-8v3H9v6h14zm-2 4H11V5h3V2h4v3h3z"/><path d="M10 13h12v2H10zm0 5h12v2H10zm0 5h12v2H10z" class="ouiIcon__fillSecondary"/></g></svg>
            </x-slot>
            Generate Report
        </x-nav-link>
        
    </nav>
</div>
