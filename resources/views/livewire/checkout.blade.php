{{-- <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script> --}}
@push('script')
  @vite('resources/js/flowbite.js')
@endpush

<div class="bg-slate-100">
    <div class="py-5 px-3 bg-blue-700 text-center">
        <h1 class="text-2xl font-bold text-white">Checkout</h1>
    </div>
    <div class="w-1/2 mx-auto py-16">
    <div class="bg-white p-5 rounded-md">
            <table class="w-full">
                <thead class="">
                    <tr class="bg-blue-600 text-white">
                        <th class="py-2 rounded-tl-md font-semibold">Selected Services</th>
                        <th class="py-2 font-semibold">Price</th>
                        <th class="py-2 font-semibold">Charge (5%)</th>
                        <th class="py-2 font-semibold">Processing Fee (5%)</th>
                        <th class="py-2 rounded-tr-md font-semibold">Tax (8%)</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    {{-- @php
                        $totalPrice = 0;
                        $totalProcessingFee = 0;
                        $totalTax = 0;
                        $totalCharge = 0;
                    @endphp --}}
                    {{-- @foreach($proService as $service) --}}
                        {{-- @php
                            // Calculate processing fee (5%)
                            $processingFee = $proService->price * 0.05;
                            // Calculate tax (8%)
                            $tax = $proService->price * 0.08;
                            // Calculate total charge for this service
                            $totalCharge += $proService->price + $processingFee + $processingFee + $tax;
                            // Add price, processing fee, and tax to overall totals
                            $totalPrice += $proService->price;
                            $totalProcessingFee += $processingFee;
                            $totalTax += $tax; --}}
                         {{-- @endphp --}}
                        <tr class="mb-4 border">
                            <td class="py-2 font-semibold">{{$service_name}}</td>
                            <td class="py-2 font-semibold">NPR. {{$service_price}}</td>
                            <td class="py-2 font-semibold">NPR. {{$serviceCharge}}</td>
                            <td class="py-2 font-semibold">NPR. {{$totalProcessingFee}}</td>
                            <td class="py-2 font-semibold">NPR. {{$totalTax}}</td>
                        </tr>
                    {{-- @endforeach --}}
                    <tr class="border">
                        <td class="py-2 font-semibold">Total Charges</td>
                        {{-- <td class="py-2 font-semibold">NPR. {{$totalCharge}}</td> --}}
                        <td class="py-2 font-semibold">NPR. <span>{{$totalCharge}}</span></td>
                        <td></td>
                        <td></td>
                        <td ></td>
                    </tr>
                </tbody>
            </table>
            <form action="{{ route('khalti.payment') }}" method="post">
                @csrf
                {{-- <button class="bg-purple-600 text-white font-semibold px-4 py-2 mt-4 w-full rounded-b-md">Pay Via Khalti</button>   --}}
                <button class="bg-purple-600 text-white font-semibold px-4 py-2 mt-4 w-full rounded-b-md">
                    <div class="">
                        <img class="w-1/2 mx-auto h-10 object-contain" src="{{asset('storage/logo/button_khalti.png')}}" alt="">
                    </div>
                </button>  

            </form>


            {{-- <form wire:submit="KhaltiVerification">  --}}
                {{-- <input type="text" wire:model="totalCharge" > --}}
                {{-- <button class="bg-purple-600 text-white font-semibold px-4 py-2 mt-4 w-full rounded-b-md">Pay Via Khalti</button>   --}}
            {{-- </form> --}}


            {{-- <form wire:submit.prevent="session">  --}}
                {{-- <input type="text" wire:model="totalCharge" > --}}
                {{-- <button class="bg-blue-600 text-white font-semibold px-4 py-2 mt-4 w-full rounded-b-md">Pay Via Stripe</button>   --}}
            {{-- </form> --}}

            {{-- <button wire:click="KhaltiVerification" class="bg-purple-600 text-white font-semibold px-4 py-2 mt-4 w-full rounded-b-md">Pay Via Khalti</button>   --}}
            <button wire:click="session" class="bg-gray-300 text-white font-semibold px-4 py-2 mt-4 w-full rounded-b-md">
                <div>
                    <img class="w-1/2 mx-auto h-10 object-contain" src="{{asset('storage/logo/Stripe-button.png')}}" alt="">
                </div>
            </button>  

           


                
    
        </div>
    </div>
</div>






