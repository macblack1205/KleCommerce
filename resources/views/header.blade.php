<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
</head>
@vite('resources/css/app.css')
@php $user = session('user'); $coupons = session('coupons'); @endphp

{{-- upper section --}}
<section class="grid grid-cols-10 px-10 py-3 w-full h-15  bg-black text-white dark:bg-gray-900 dark:text-gray-200">
    {{-- sliding text --}}
    <div class="col-span-7 relative overflow-hidden">
        <span class="absolute inset-0 flex items-center whitespace-nowrap animate-slide">
            @if($user && !empty($coupons))
                Use <strong class="mx-2">{{$coupons['0']['coupon']}}</strong> to get {{$coupons['0']['discount_percentage']}}% discount
            @else 
                Get started to buy and sell products at <strong class="mx-2 italic">discount prices</strong>
            @endif
        </span>
    </div>    
    {{-- icons --}}
    <div class="col-span-3 flex items-center justify-end">
        @if($user){{$user['name']}}@endif
        @include('parts.nav-icons', ['user' => $user])
    </div>
</section>

{{-- header --}}
<header class="bg-white dark:bg-gray-800 flex py-3 px-10 items-center justify-between">
    {{-- logo --}}
    <div class="p-0 m-0">
        <a href="{{ route('home') }}" class="flex flex-row">
            <h2 class="text-2xl text-black dark:text-white"><b>Kle</b>-Commerce</h2>
        </a>
    </div>
    {{-- coupon text --}}
    @if($user)
    <div class="flex flex-row items-center space-x-2 justify-end">
        <a href="{{ route('coupons') }}" class="hidden md:flex text-S text-black dark:text-gray-300 p-0 m-0 flex-row items-center">
            <p class="mr-2">EXTRA %</p>
            BY USING <p class="ml-2 underline">COUPONS</p>
            <i class="fa-solid fa-arrow-up-right-from-square pl-1"></i>
        </a>
        {{-- search --}}
        @include('parts.search')
    </div>
    @endif
</header>
<hr>
<script 
    src="https://kit.fontawesome.com/d3244f9937.js" crossorigin="anonymous">
</script>

<body>
    

