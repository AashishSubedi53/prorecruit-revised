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

        
        @if(auth()->user()->user_type==='customer')
          <a href="{{route('customer.my-bookings')}}">My Bookings</a>
        @endif
        
        <a href="
        @if(auth()->user()->user_type==='customer')
          {{route('customer.my-profile.index')}}

        @else
          {{route('professional.my-profile.index')}}
        @endif
        
        ">
          <div class="h-12 w-12">
            @if(auth()->user()->user_type === 'customer' && auth()->user()->customer->profile_image != null) 
            <img src="{{ asset('storage/' . auth()->user()->customer->profile_image)}}" alt="" class="h-full w-full rounded-full">
            @elseif(auth()->user()->user_type === 'professional' && auth()->user()->professional->profile_image != null)
            <img src="{{ asset('storage/' . auth()->user()->professional->profile_image)}}" alt="" class="h-full w-full rounded-full">
           @elseif(auth()->user()->user_type === 'customer' && auth()->user()->customer->profile_image === null)
           <img src="{{asset('storage/images/default-profile.png')}}" alt="">
            @endif
          </div>
        </a>
        <form action="{{route('logout')}}" method="POST">
          @csrf
          <input type="submit" value="Logout" class="bg-orange-400 py-2 px-4 cursor-pointer rounded-full text-white active:bg-orange-300">
          </input>
        </form>
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
