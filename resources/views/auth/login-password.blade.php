@include('header')
<div class="container mx-auto p-4 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Enter Password</h2>
         {{-- success error messages --}}
         @include('parts.success-prompt')

         {{-- login form --}}
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-4">
                <div class="flex flex-row space-x-2 items-center justify-between w-full">
                    <input type="password" name="password" id="password" placeholder="Password" class="auth-input-field" required>
                    <button type="submit" class="button"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
                <div class="input-field-message-field">
                    <span class="input-field-message ">@error('password'){{$message}} @enderror </span>
                </div>
            </div>  
        </form>
        <div class="flex justify-end">
            <a href="login" class="link-text">Back</a>
        </div>
    </div>
</div>

