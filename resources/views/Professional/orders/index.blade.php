@extends('layouts.users.app')
@section('title')
  My Orders
@endsection

@section('content')
@push('script')
  @vite('resources/js/flowbite.js')
@endpush

<div class="relative overflow-x-auto mb-10 p-10 !text-black">
    @livewire('my-orders')
</div>

  
@endsection