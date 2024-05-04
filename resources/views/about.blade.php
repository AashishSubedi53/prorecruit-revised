@extends('layouts.users.app')

@section('title')
About Us
@endsection

@section('content')
@push('script')
  @vite('resources/js/flowbite.js')
@endpush

<div class="text-justify w-1/2 mx-auto p-8">
    <div class="grid grid-cols-[400px_400px] gap-10">
        <div class="image">
            <img src="{{asset('storage/' . $siteSettings->about_us_image)}}" alt="image" class="object-cover" height="1000px" width="400px">

        </div>
        <div class="description">
            <p>
            {{$siteSettings->about_us_description}}
            </p>
        </div>
    </div>
</div>    
@endsection
