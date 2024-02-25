@extends('layouts.users.app')

@section('title')
    Add Services
@endsection

@section('content')
    <div class="p-5">
        <!-- Your form opening tag with proper action and method attributes -->

        <!-- Service Categories -->
        <div class="mb-4 mt-10">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="service_categories">
                Select Service Categories (Max 2):
            </label>
            <select multiple name="service_categories[]" id="service_categories"
                    class="w-full px-4 py-2 border rounded-md">
                <!-- Loop through your available service categories from the backend -->
                @foreach($serviceCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Selected Services -->
        @foreach($serviceCategories as $category)
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Select Services for {{ $category->category_name }} (Max 2):
                </label>
                <select multiple name="services[{{ $category->id }}][]" class="w-full px-4 py-2 border rounded-md">
                    <!-- Loop through services within the selected category -->
                    @foreach($category->service as $service)
                        <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                    @endforeach
                </select>
            </div>
        @endforeach

        <!-- Your other form fields go here -->

        <!-- Submit Button -->
        <div class="mt-4">
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add Services
            </button>
        </div>

        <!-- Your form closing tag -->
    </div>
@endsection
