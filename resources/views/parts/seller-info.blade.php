<button onclick="location.href='{{ route('user',['name' =>$product['user']['name'], 'id'=> $product['user']['id']]) }}'" class="mb-4 p-2 w-full flex flex-row border-2 rounded-lg space-x-3 items-center">
    <img src="{{ asset($product['user']['photo']) }}" alt="Seller photo" class="w-20 h-20 object-cover rounded-md">
    <div class="flex flex-col space-y-2 items-start ">
        <p class="text-sm text-gray-800"><b>{{$product['user']['name']}} {{$product['user']['surname']}}</b></p>
        <p class="text-sm text-gray-600"><b>Country:</b> {{$product['user']['country']}}</p>
        <p class="text-sm text-gray-600"><b>Email:</b> {{$product['user']['email']}}</p>
    </div>
</button>