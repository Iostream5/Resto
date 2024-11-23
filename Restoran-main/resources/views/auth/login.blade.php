
<!-- Langsung di file login.blade.php -->
<x-guest-layout>
    <div class="min-h-screen">
        <!-- Konten di sini -->
        <x-authentication-card>
            <x-slot name="logo">
                <h1 class="text-xl font-bold text-yellow-600 m-0 flex items-center">
                    <i class="fa fa-utensils me-3"></i>Login
                </h1>
            </x-slot>
    
            <x-validation-errors class="mb-4" />
    
            @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
            @endsession
    
            <form method="POST" action="{{ route('login') }}" class="">
                @csrf
    
                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="text-yellow-500" />
                    <x-input id="email" class="block mt-1 w-full rounded-md focus:ring-2 focus:ring-yellow-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>
    
                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" class="text-yellow-500" />
                    <div class="relative">
                        <x-input id="password" class="block mt-1 w-full  rounded-md focus:ring-2 focus:ring-yellow-500" type="password" name="password" required autocomplete="current-password" />
                    </div>
                </div>
    
                <div class="block mt-4">
                    <label for="show" class="flex items-center">
                        <input type="checkbox" class="rounded text-yellow-600 shadow-sm focus:ring-yellow-500" name="show" id="togglePassword" style="border-radius: 5px;">
                        <span class="ms-2 text-sm text-gray-400">{{ __('Show Password') }}</span>
                    </label>
                </div>
    
                <div class="block mt-1">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" class="rounded text-yellow-600 shadow-sm focus:ring-yellow-500" />
                        <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>
    
                <div class="flex items-center justify-end mt-4 gap-1">
                    <a class="underline me-4 text-sm text-yellow-500 hover:text-yellow-300 rounded-md focus:outline-none focus:text-yellow-500" href="{{ route('register') }}" style="">
                        {{ __('Don`t have an account?') }}
                    </a>
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-yellow-500 hover:text-yellow-300 rounded-md focus:outline-none focus:text-yellow-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
    
                    <x-button class=" bg-yellow-500 hover:bg-yellow-600 focus:bg-yellow-600 active:bg-yellow-700 focus:ring-white px-4 py-2 text-sm">
                        {{ __('Log in') }}
                    </x-button>
                </div>
    
            </form>
        </x-authentication-card>
    </div>
</x-guest-layout>
<script>
    // JavaScript untuk toggle visibility
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
