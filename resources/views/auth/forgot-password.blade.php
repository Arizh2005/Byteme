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
                <h1 class="text-4xl text-center font-bold text-blue-900 mb-2">Forgot Your Password?</h1>
                <p class="text-gray-600 text-center mb-6">Please input your email address account to receive a reset link</p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full h-8 border border-gray-400" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-12">
                        <x-primary-button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 justify-center text-base rounded w-full h-12">
                            {{ __('Forgot Password') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
