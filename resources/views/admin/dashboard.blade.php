<x-app-layout>
    <x-slot name="header">
            {{ __('Dashboard') }}
    </x-slot>
        
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-5">
        <div class="p-6 border-b border-gray-200">
            <p class="text-2xl text-rose-700 font-semibold">
                <span>Welcome,&nbsp;</span>
                {{Auth::user()->username }}
            </p>
        </div>
    </div>

    <div x-data="stats" x-init="getData">
        <div id="data" class="flex flex-col sm:flex-row md:flex-row gap-x-1  justify-between md:overflow-auto mb-10">
            <div id="users" class="flex flex-row gap-x-4 bg-white rounded-md shadow-sm py-5 px-8 text-center">
                <div class="bg-purple-500 h-10 w-10 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="h-10 w-10">
                        <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z" clip-rule="evenodd" />
                        <path d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-[16px]" id="totalUsers" x-text="stats.totalUsers"></p>
                    <p class="text-gray-500 font-semibold text-[12px]">Total Users</p>
                </div>                
            </div>
            <div id="users" class="flex flex-row gap-x-1 bg-white rounded-md shadow-sm py-5 px-8 text-center">
                <div class="bg-rose-500 h-10 w-10 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="h-10 w-10">
                        <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z" clip-rule="evenodd" />
                        <path d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-[16px]" id="totalCustomers" x-text="stats.totalCustomers"></p>
                    <p class="text-gray-500 font-semibold text-[12px]">Total Customers</p>
                </div>                
            </div>
            <div id="users" class="flex flex-row gap-x-1 bg-white rounded-md shadow-sm py-5 px-8 text-center">
                <div class="bg-blue-500 h-10 w-10 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="h-10 w-10">
                        <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z" clip-rule="evenodd" />
                        <path d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-[16px]" id="totalProfessionals" x-text="stats.totalProfessionals"></p>
                    <p class="text-gray-500 font-semibold text-[12px]">Total Professionals</p>
                </div>                
            </div>
            <div id="users" class="flex flex-row gap-x-1 bg-white rounded-md shadow-sm py-5 px-8 text-center">
                <div class="bg-yellow-300 h-10 w-10 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-10 h-10">
                    <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z" clip-rule="evenodd" />
                </svg>


                </div>
                <div>
                    <p class="font-bold text-[16px]" x-text="stats.totalBookings"></p>
                    <p class="text-gray-500 font-semibold text-[12px]">Total Booking</p>
                </div>                
            </div>
            <div id="users" class="flex flex-row gap-x-1 bg-white rounded-md shadow-sm py-5 px-8 text-center">
                <div class="bg-green-500 h-10 w-10 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-10 h-10">
                    <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z" clip-rule="evenodd" />
                </svg>


                </div>
                <div>
                    <p class="font-bold text-[16px]" x-text="stats.todayBookings"></p>
                    <p class="text-gray-500 font-semibold text-[12px]">Today Booking</p>
                </div>                
            </div>
            <div id="users" class="flex flex-row gap-x-1 bg-white rounded-md shadow-sm py-5 px-8 text-center">
                <div class="bg-rose-800 h-10 w-10 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-10 h-10">
                        <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-[16px]" id="totalServices" x-text="stats.totalServices"></p>
                    <p class="text-gray-500 font-semibold text-[12px]">Total Services</p>
                </div>                
            </div>          

        </div>       

        <div id="analysis" class="mb-10 bg-white">
            <div id="header" class="bg-slate-200">
                <h1 class="bg-slate-500 rounded-t-lg text-white text-center py-3 font-semibold">Last 7 Days Booking Report</h1>
            </div>
            <div id="live-graph">
            <script src="https://cdnjs.com/libraries/Chart.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
                <div class="map_canvas">
                  <canvas id="myChart" width="auto" height="100"></canvas>
                </div>

                <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($labels) ?>,
                        datasets: [{
                            label: '',
                            data: <?php echo json_encode($bookings); ?>,
                            backgroundColor: [
                                'rgba(31, 58, 147, 1)',
                                'rgba(37, 116, 169, 1)',
                                'rgba(92, 151, 191, 1)',
                                'rgb(200, 247, 197)',
                                'rgb(77, 175, 124)',
                                'rgb(30, 130, 76)'
                            ],
                            borderColor: [
                                'rgba(31, 58, 147, 1)',
                                'rgba(37, 116, 169, 1)',
                                'rgba(92, 151, 191, 1)',
                                'rgb(200, 247, 197)',
                                'rgb(77, 175, 124)',
                                'rgb(30, 130, 76)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                max: 20,
                                min: 0,
                                ticks: {
                                    stepSize: 5
                                }
                            }
                        },
                        plugins: {
                            title: {
                                display: false,
                                text: 'Custom Chart Title'
                            },
                            legend: {
                                display: false,
                            }
                        }
                    }
                });
                </script>                            

            </div>
        </div>

        <div id="latest-data" class="flex flex-col gap-y-10 sm:flex-row justify-around">
            <div id="recent-booking">                
                <div class="relative overflow-x-auto">
                    <p class="bg-purple-600 text-white rounded-t-md py-2 text-center font-semibold">Recent Bookings</p>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Username
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Booking Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Payment Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Payment Method
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders->sortByDesc('created_at')->take(5) as $order)                               
                            
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{$order->customer->user->username}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$order->created_at}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$order->payment->payment_status}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$order->payment->payment_method}}
                                </td>
                            </tr> 
                            @endforeach
                                       
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="latest-users">
            <div class="relative overflow-x-auto">
                    <p class="bg-purple-600 text-white py-2 rounded-t-md text-center font-semibold">Latest Users</p>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Address
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    User Type
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users->sortByDesc('created_at')->take(5) as $user)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{$user->username}}
                                </td>
                                <td class="px-6 py-4">
                                @if ($user->user_type === 'customer' && $user->customer)
                                    {{ $user->customer->address }}
                                @elseif ($user->user_type === 'professional' && $user->professional)
                                    @if ($user->professional->address->address_line_1 !== null)
                                        {{ $user->professional->address->address_line_1 }}
                                    @else
                                    N/A
                                    @endif
                                @else
                                    N/A
                                @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{$user->user_type}}
                                </td>
                            </tr>  
                            @endforeach                                    
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>
    </div>   
    <script>
    // Fetch and update statistics
    fetch('/admin/dashboard/stats')
        .then(response => response.json())
        .then(data => {
            
        })
        .catch(error => console.error('Error fetching statistics:', error));
</script>




</x-app-layout>

