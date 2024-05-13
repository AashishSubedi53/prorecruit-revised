@extends('layouts.users.app')

@section('content')

<div class="bg-blue-700 p-2">
  <h1 class="text-white font-semibold text-xl text-center">
      {{$ServiceCategoryName}} Services
  </h1>
</div>

<div class="grid grid-cols-3 w-3/4 mx-auto p-8 gap-4">
  @foreach($services as $service)
    <a href="{{route('customer.search-professionals.index', ["service"=>$service->service_name])}}" class="bg-slate-200 shadow-md rounded-md">
      <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-60 h-60 mb-2 mx-auto">
      <p class="text-center mb-2 text-gray-500 font-semibold">{{ $service->service_name }}</p>
    </a>
  @endforeach
</div>
@endsection