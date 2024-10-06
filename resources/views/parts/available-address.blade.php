<div class="text-sm text-gray-600 mb-4 flex flex-row justify-between">
    <a href="{{route('profile')}}"><p><strong>Manage Address:</strong></p></a>
    @if($address)
    <span class="text-teal-500">{{$address['street']}}, {{$address['city']}}, {{$address['country']}}<i class="fa-solid fa-truck ml-2"></i></span>
    @else
    <span class="text-teal-500">No delivery address found!<i class="fa-solid fa-truck ml-2"></i></span>
    @endif
</div>