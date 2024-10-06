
@if ($product['user']['id'] == session('user_id'))
    <div class="flex w-full flex-row justify-between items-center space-x-2">
        <!-- Edit Product Button -->
        <button class="w-3/4 bg-teal-600 text-white py-3 rounded-md text-lg font-semibold mb-4 hover:bg-teal-800"
                onclick="toggleEditProductForm()">
            Edit Product
        </button>
        <!-- Delete Product Button -->
        <form method="POST" action="{{ route('product.destroy', $product['id']) }}" class="p-0 m-0 w-1/4">
            @csrf
            @method('DELETE')
            <button type="submit" class=" w-full bg-red-600 text-white py-3 rounded-md text-lg font-semibold mb-4 hover:bg-red-800">
                Delete
            </button>
        </form>
    </div>
@else
    <!-- Add to Cart Form -->
    <form id="add-to-cart-form-{{ $product['id'] }}" action="{{ route('cart.add', ['id' => $product['id']]) }}" method="POST" style="display: none;">
        @csrf
    </form>
    <button class="w-full bg-teal-600 text-white py-3 rounded-md text-lg font-semibold mb-4 hover:bg-teal-800"
            onclick="document.getElementById('add-to-cart-form-{{ $product['id'] }}').submit();">
        Add to Cart
    </button>
@endif

<!-- Include the Edit Product Modal -->
@include('parts.edit-product-popup')
