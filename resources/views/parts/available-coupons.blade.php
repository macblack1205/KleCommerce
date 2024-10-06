@php  $coupons = session('coupons'); @endphp
<div class="flex flex-row justify-between mb-2">
    <h2 class="text-lg font-bold text-gray-800 ">Available Coupons</h2>
    <a href="{{ route('coupons') }}"><h2 class="text-lg font-sm text-gray-500">View all</h2></a>
</div>
<div class="mb-4 border-2 overflow-auto rounded-lg p-2">
    <div class="flex overflow-auto space-x-2 w-auto">
        @foreach ($coupons as $c)
            <div class="bg-gray-100 p-2 shrink-0 rounded-md shadow-md text-center">
                <p class="text-sm font-bold text-gray-800">{{$c['discount_percentage']}} % Off</p>
                <h1 class="text-teal-600 font-medium text-xl">{{$c['coupon']}}</h1>
            </div>
        @endforeach
    </div>
</div>