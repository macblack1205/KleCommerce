@php  $user = session('user'); @endphp
@include('header')

{{-- Hero --}}
<div class="relative w-full sm:w-[90%] h-[40vh] sm:h-[60vh] mx-auto my-10 rounded-lg overflow-hidden shadow-lg">
    <!-- Hero Image Background -->
    <img src="{{ asset('bg/hero.jpg') }}" alt="Hero Image" class="absolute w-full h-full object-cover object-left">
    <!-- Hero Text Overlay -->
    <div class="absolute inset-0 flex items-center p-4 sm:p-10 bg-black bg-opacity-30 dark:bg-gray-900 dark:bg-opacity-50">
        <div class="text-white w-full">
            <h1 class="text-2xl sm:text-4xl font-bold mb-2 sm:mb-4">Discover the Best Products</h1>
            <p class="text-md sm:text-lg">Find the latest and greatest in our collection. Quality products at unbeatable prices, curated just for you.</p>
        </div>
    </div>
</div>
@if($user)
    {{-- create listing --}}
    @include('sections.create-listing')
    {{-- Products --}}
    @if($products)
        @include('product.products')
    @endif
@endif
