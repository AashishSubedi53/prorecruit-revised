  <div class="flex flex-row justify-between align-text-top">
    <div class="left">
      <!-- <img src="{{asset('logo')}}" alt="logo"> -->
      <!-- <a href="{{route('home')}}"> -->
      <a href="@auth
      @if (auth()->user()->user_type==='professional')
      {{route('professional.index')}}  
      
      @elseif (auth()->user()->user_type==='customer')
      {{route('home')}}
      @endif

      @else
      {{route('home')}}
      @endauth">    
      <i class="text-[24px] font-semibold text-white"><span class="text-orange-400">Pro</span> Recruit</i>
      </a>
    </div> 


      
    
    <!-- <div class="right">
      <ul class="flex space-x-10 text-center">
        <li class="text-white text-[18px] p-2"><a href="{{route('login')}}">Login</a></li>
        <li class="text-white text-[18px] p-2"><a href="{{route('register', ['user_type' => 'customer'])}}">Sign Up</a></li>
        <li class="bg-orange-400 py-2 px-4 rounded-full text-white"><a href="{{route('register', ['user_type' => 'professional'])}}">Signup as Pro</a></li>
      </ul>
    </div> -->


    @auth
    <div class="right">
      <ul class="flex space-x-3 text-center">

        
        {{-- @if(auth()->user()->user_type==='customer')
          <a href="{{route('customer.my-bookings')}}">My Bookings</a>
        @endif --}}
        
        <a href="
        @if(auth()->user()->user_type==='customer')
          {{route('customer.my-profile.index')}}

        @else
          {{route('professional.my-profile.index')}}
        @endif
        
        ">
          <div class="h-12 w-12 rounded-full border-2 border-[#2ade2a]">
            @if(auth()->user()->user_type === 'customer' && auth()->user()->customer->profile_image != null) 
            <img src="{{ asset('storage/' . auth()->user()->customer->profile_image)}}" alt="" class="h-full w-full rounded-full">
            @elseif(auth()->user()->user_type === 'professional' && auth()->user()->professional->profile_image != null)
            <img src="{{ asset('storage/' . auth()->user()->professional->profile_image)}}" alt="" class="h-full w-full rounded-full">
           @elseif(auth()->user()->user_type === 'customer' && auth()->user()->customer->profile_image === null)
           <img src="{{asset('storage/images/default-profile.png')}}" alt="">
            @endif
          </div>

          
        </a>
        
        {{-- <form action="{{route('logout')}}" method="POST">
          @csrf
          <input type="submit" value="Logout" class="bg-orange-400 py-2 px-4 cursor-pointer rounded-full text-white active:bg-orange-300">
          </input>
        </form> --}}

        <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="click" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 border-2 border-white" type="button">{{auth()->user()->username}} <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
          </svg>
          </button>
          
          <!-- Dropdown menu -->
          <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
              <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                <li>
                  <a href="
                  @if(auth()->user()->user_type==='customer')
                  {{route('customer.my-profile.index')}}
        
                  @else
                    {{route('professional.my-profile.index')}}
                  @endif
                  "
                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My Profile</a>

                  @if(auth()->user()->user_type==='customer')
                    <a href="{{route('customer.my-bookings')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My Bookings</a>
                  @endif
                </li>
                <li>
                  <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    <form action="{{route('logout')}}" method="POST">
                      @csrf
                      <input class="cursor-pointer" type="submit" value="Logout">
                      </input>
                    </form>
                  </a>
                  
                </li>
              </ul>
          </div>
      </ul>
    </div>
    @else
    <div class="right">
      <ul class="flex space-x-10 text-center">
        <li class="text-white text-[18px] p-2"><a href="{{route('login')}}">Login</a></li>
        <li class="text-white text-[18px] p-2"><a href="{{route('register', ['user_type' => 'customer'])}}">Sign Up</a></li>
        <li class="bg-orange-400 py-2 px-4 rounded-full text-white"><a href="{{route('register', ['user_type' => 'professional'])}}">Signup as Pro</a></li>
      </ul>
    </div>

  @endauth
  </div>  
