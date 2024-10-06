<form action="{{ route('products') }}" method="get" class="p-0 m-0">
    <div class="input-box relative">
        <input type="text" name="search" placeholder="Looking for something?" class="input-field">
        <button type="submit" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
            <i class="fa-solid fa-magnifying-glass cursor-pointer icons"></i>
        </button>
    </div>
</form>
