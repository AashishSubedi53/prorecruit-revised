@extends('layouts.users.app')
@section('title')
  Contact Us
@endsection

@section('content')

<section id="form" class="grid grid-cols-2 gap-10 my-5 mx-10">
  <div class="left">
    <form action="{{route('contact-submit')}}" method="post">
      @csrf
    <div class="grid grid-cols-2 mb-2 gap-2">
      <input type="text" name="first_name" placeholder="First Name">
      <input type="text" name="last_name" placeholder="Last Name">
      <input type="email" name="email" placeholder="Email">
      <input type="text" name="phone_number" placeholder="Phone Number">
    </div>
    <div>
      <textarea name="message" rows="10" placeholder="Message" class="w-full"></textarea>
    </div>
    <input type="submit" value="Submit" class="text-center text-white font-semibold bg-blue-500 w-full p-2">
    </form> 
  </div>
  
  <div class="right w-1/2 flex flex-col space-y-10">
    <div>
      <!-- <img src="" alt="address"> -->
      <svg xmlns="http://www.w3.org/2000/svg" height="30" width="20" viewBox="0 0 384 512"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
      <p>Informatics College Pokhara, Lions Marga 33800</p>
    </div>

    <div>
      <!-- <img src="" alt="phone number"> -->
      <svg xmlns="http://www.w3.org/2000/svg" height="30" width="20" viewBox="0 0 512 512"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
      <p> +977 9876543210 </p>
    </div>

    <div>
      <!-- <img src="" alt="mail"> -->
      <svg xmlns="http://www.w3.org/2000/svg" height="30" width="20" viewBox="0 0 512 512"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
      prorecruit5555@gmail.com
    </div>
    </div>
</section>





<section id="map">
  <div class="py-5 px-10">
    <iframe class="w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3515.751771143786!2d83.99780877543188!3d28.2148533758954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39959434ad2a5bf9%3A0xf4e7f9c749f63113!2sInformatics%20College%20Pokhara!5e0!3m2!1sen!2snp!4v1704624075402!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

  </div>
</section>
  
@endsection
