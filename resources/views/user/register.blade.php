@include('header')
<div class="container mx-auto p-4 bg-white dark:bg-gray-800 h-full md:h-[83vh] flex justify-center items-start md:items-center">
    <div class="w-full px-4 md:px-0 md:max-w-lg max-h-[100vh]">
        <h2 class="text-2xl text-gray-800 dark:text-white font-bold mb-6 text-center">Register</h2>
        {{-- success error messages --}}
        @include('parts.success-prompt')

        {{-- register form --}}
        <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- Row 1: Name and Surname -->
            <div class="input-field-space">
                <div class="input-box w-1/2 pr-2">
                    <input type="text" name="name" placeholder="Name" value="{{old('name')}}" required class="input-field">
                    <i class="fa-solid fa-user icons"></i>
                </div>
                <div class="input-box w-1/2 pl-2">
                    <input type="text" name="surname" placeholder="Surname" value="{{old('surname')}}" required class="input-field">
                    <i class="fa-solid fa-user icons"></i>
                </div>
            </div>
            <div class="input-field-message-field">
                <span class="input-field-message ">@error('name'){{$message}} @enderror </span>
                <span class="input-field-message ">@error('surname'){{$message}} @enderror </span>
            </div>

            <!-- Row 2: Age and Country -->
            <div class="input-field-space">
                <div class="input-box w-1/2 pr-2">
                    <input type="number" name="age" placeholder="Age" value="{{old('age')}}" required class="input-field">
                    <i class="fa-solid fa-calendar icons"></i>
                </div>
                
                <div class="input-box w-1/2 pl-2">
                    <input type="text" name="country" placeholder="Country" value="{{old('country')}}" required class="input-field">
                    <i class="fa-solid fa-globe icons"></i>
                </div>
            </div>
            <div class="input-field-message-field">
                <span class="input-field-message ">@error('age'){{$message}} @enderror </span>
                <span class="input-field-message ">@error('country'){{$message}} @enderror </span>
            </div>

            <!-- Row 3: Email and Phone -->
            <div class="input-field-space">
                <div class="input-box w-1/2 pr-2">
                    <input type="email" name="email" placeholder="Email" value="{{old('email')}}" required class="input-field">
                    <i class="fa-solid fa-envelope icons"></i>
                </div>
                <div class="input-box w-1/2 pl-2">
                    <input type="text" name="number" placeholder="Phone number" value="{{old('number')}}" class="input-field">
                    <i class="fa-solid fa-phone icons"></i>
                </div>
            </div>
            <div class="input-field-message-field">
                <span class="input-field-message">@error('email'){{$message}} @enderror </span>
                <span class="input-field-message ">@error('number'){{$message}} @enderror </span>
            </div>

            <!-- Row 4: Password and Confirm Password -->
            <div class="input-field-space">
                <div class="input-box w-1/2 pr-2">
                    <input type="password" name="password" placeholder="Password" value="{{old('password')}}" required class="input-field">
                    <i class="fa-solid fa-lock icons"></i>
                </div>
                <div class="input-box w-1/2 pl-2">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" value="{{old('password_confirmation')}}" required class="input-field">
                    <i class="fa-solid fa-lock icons"></i>
                </div>
            </div>
            <div class="input-field-message-field">
                <span class="input-field-message ">@error('password'){{$message}} @enderror </span>
                <span class="input-field-message ">@error('password_confirmation'){{$message}} @enderror </span>
                <span class="input-field-message ">@error('photo'){{$message}} @enderror </span>
            </div>

            <!-- Registration Button and Login Link and Photo upload -->
            <div class="flex items-center justify-between mb-4">
                <a href="login" class="link-text">
                    Login here
                </a>
                <div class="flex flex-row m-0 p-0 space-x-2">
                    <label class="bg-gray-600 text-white px-3 py-1 rounded-md text-base hover:bg-gray-400 focus:outline-none">
                        <i class="fa-solid fa-image cursor-pointer text-white hover:text-gray-2 00 p-2 hover:scale-110"></i>
                        <input type="file" name="photo" class="hidden" onchange="updateFileName(this)">
                    </label>
                    <button type="submit" class="button-sm">
                        Register <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>