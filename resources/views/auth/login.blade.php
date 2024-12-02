<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta name="crsf-token" content="{{csrf_token()}}">
</head>
<body>
    <div class="flex h-screen">
        <!-- Left Side (Logo and Design) -->
        <div class="w-5/12 bg-yellow-100 flex justify-center items-center">
            <div class="text-center">
                <img src="{{ asset('images/laptify.png') }}" alt="Laptify Logo" class="mb-4 mx-auto w-80 h-auto"> <!-- Ganti dengan URL logo -->
            </div>
        </div>

        <!-- Right Side (Login Form) -->
        <div class="w-7/12 flex justify-center items-center">
            <div class="w-3/4 max-w-md">
                <h1 class="text-5xl text-center font-bold text-blue-900 mb-2">Welcome Back!</h1>
                <p class="text-gray-600 text-center mb-6">Please enter your username and password to continue</p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Username')" />
                        <x-text-input id="email" class="block mt-1 w-full h-8 border border-gray-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full h-8 border border-gray-400" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember Me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-center mt-6">
                        <x-primary-button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 justify-center text-base rounded w-full h-12">
                            {{ __('Login') }}
                        </x-primary-button>
                    </div>

                    <p class="mt-4 text-center text-sm text-gray-500">Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign Up</a></p>

                    <div class="flex items-center justify-center mt-1">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
