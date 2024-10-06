@include('header')
@php $couponsCollection = collect($coupons); @endphp

<div class="min-h-screen dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-center text-gray-900 dark:text-white">Coupons Dashboard</h1>

    @foreach($couponsCollection->groupBy('user_id') as $userId => $userCoupons)
        <div class="mt-8">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4">User ID: {{ $userId }}</h2>

            {{-- Coupon Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach($userCoupons as $coupon)
                    <div class="bg-gray-200 dark:bg-gray-700 p-4 rounded-lg shadow">
                        <div class="flex justify-between items-center text-sm">
                            <div>
                                <div class="text-sm font-bold text-gray-800 dark:text-white">{{ $coupon['discount_percentage'] }}% Off</div>
                                <p class="text-teal-600 font-medium text-xl">{{ $coupon['coupon'] }}</p>
                            </div>
                            @if (session('user_id') === $coupon['user_id'])
                                <div>
                                    <button onclick="toggleForm('{{ $coupon['id'] }}')" class="text-blue-500 hover:text-blue-700">
                                        <i class="fa-regular fa-pen-to-square icons" title="Edit"></i>
                                    </button>
                                    <form action="{{ route('coupon.destroy', $coupon['id']) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="fa-solid fa-trash icons" title="Delete"></i>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                        <form method="POST" action="{{ route('coupon.update', $coupon['id']) }}" id="edit-form-{{ $coupon['id'] }}" class="hidden mt-2">
                            @csrf
                            <div class="flex flex-col space-y-2 justify-start">
                                <div class="input-box">
                                    <input type="text" name="coupon" placeholder="Coupon" value="{{ $coupon['coupon'] }}" class="input-field">
                                </div>
                                <div class="input-box">
                                    <input type="number" name="discount_percentage" placeholder="Discount %" value="{{ $coupon['discount_percentage'] }}" class="input-field">
                                </div>
                                <button class="button-sm"><i class="fa-solid fa-arrow-right icons"></i></button>
                            </div>                            
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

<script>
function toggleForm(id) {
    const form = document.getElementById(`edit-form-${id}`);
    form.classList.toggle('hidden');
}
</script>
