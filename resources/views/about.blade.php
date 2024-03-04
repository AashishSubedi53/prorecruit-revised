@extends('layouts.users.app')

@section('title')
About Us
@endsection

@section('content')

<div class="text-justify w-1/2 mx-auto p-8">
    <div class="grid grid-cols-[400px_400px] gap-10">
        <div class="image">
            <img src="{{asset('storage/' . $siteSettings->about_us_image)}}" alt="image" class="object-fit" height="400px" width="400px">

        </div>

        <div class="description">
            <p>
            {{$siteSettings->about_us_description}}
            </p>

        </div>

        <!-- second image and description -->

        <div class="description">
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem animi laudantium magnam alias eius libero.
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem animi laudantium magnam alias eius libero
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem animi laudantium magnam alias eius liberoLorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem animi laudantium magnam alias eius libero
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem animi laudantium magnam alias eius libero
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem animi laudantium magnam alias eius libero
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem animi laudantium magnam alias eius libero
            </p>
        </div>

        <div class="image">
            <img src="{{asset('build/assets/images/cleaning.png')}}" alt="image" height="400px" width="400px">

        </div>

    </div>
</div>




    
@endsection
