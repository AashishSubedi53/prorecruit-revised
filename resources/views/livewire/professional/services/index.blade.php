<div>  
    {{-- @section('content') --}}
    <div class="bg-blue-700 pt-10 pb-5 text-white mb-10">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <h3 class="text-2xl font-semibold">
                    My Services
                </h3>   
                <a href="{{route('professional.my-services.create')}}" class="text-blue-500 shadow font-semibold bg-white p-3 px-5 rounded-full">Add Services</a> 
            </div>
        </div>
    </div>
    <div class="relative overflow-x-auto container mx-auto mb-20">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Service Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price (Rs.)
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Time
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($professionalServices as $proService )                    
                
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$proService->id}}
                    </th>
                    <td class="px-6 py-4">
                        <div class="w-20 h-20">
                            <img src="{{asset('storage/' . $proService->service->image)}}" alt="service image" class="h-full w-full">
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        {{$proService->serviceCategory->category_name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$proService->service->service_name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$proService->price}}
                    </td>
                    <td class="px-6 py-4">
                        {{$proService->business_hours_start}} - {{$proService->business_hours_start}}
                    </td>
                    <td class="px-6 py-4">
                        {{$proService->description}}
                    </td>
                    <td>
                        <div class="flex flex-row gap-1 p-2">
                            <a href="{{route('professional.my-services.edit', $proService->id)}}" class="text-white bg-blue-700 rounded px-4 p-2">Edit</a>
                            
                                <button wire:click="delete({{$proService->id}})"  type="submit" class="text-white bg-red-700 rounded p-2">Delete</button>
                            
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>      
    {{-- @endsection --}}
</div>
