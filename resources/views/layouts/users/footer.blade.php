  <div class="flex flex-row justify-around py-10">
    <div class="left">
      <h3 class="mb-5">
        <!-- <img src="" alt="logo"> -->
        <a href="{{route('home')}}">
          <i class="text-[24px] font-semibold text-white"><span class="text-orange-400">Pro</span> Recruit</i>
        </a>
      </h3>
      <div class="flex flex-col space-y-1">
        <a href="tel:+9779876543210">+977 9876543210</a>
        <a href="mailto:prorecruit@gmail.com">prorecruit@gmail.com</a>
        <ul class="flex flex-row space-x-1">
          <li><a href=""><img src="{{asset('build/assets/logo/Instagram.png')}}" class="" alt="Instagram" height="40px" width="40px"></a></li>
          <li><a href=""><img src="{{asset('build/assets/logo/tiktok.png')}}" class="" alt="Tiktok" height="40px" width="40px"></a></li>
          <li><a href=""><img src="{{asset('build/assets/logo/Twitter.png')}}" class="" alt="Twitter" height="40px" width="40px"></a></li>
          
        </ul>
      </div>
    </div>

    <div class="quick-links">
      <h3 class="text-[20px] font-semibold mb-5">Quick Links</h3>
      <ul>
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="{{route('about')}}">About us</a></li>
        <li><a href="">Login</a></li>
        <li><a href="">Signup</a></li>
      </ul>
    </div>

    <div class="resources">
    <h3 class="text-[20px] font-semibold mb-5">Resources</h3>
      <ul>
        <li><a href="{{route('contact')}}">Contact us</a></li>
        <li><a href="">Privacy Policy</a></li>
      </ul>
    </div>

    <div class="payment-modes">
    <h3 class="text-[20px] font-semibold mb-5">We accept</h3>
      <img src="{{asset('build/assets/logo/esewa.png')}}" alt="esewa-logo" height="100px" width="100px">
      <br>
      <img src="{{asset('build/assets/logo/khalti.png')}}" alt="khalti-logo" height="100px" width="100px">
    </div>

  </div>
  <p class="text-center p-2 border-t border-white">&#169;	2023. All Rights Reserved</p>
