<x-app-layout>
    <div class="flex min-h-screen">
        <!-- Left Section -->
        <div class="w-1/2 bg-[#FFF9E6] flex justify-center items-center">
            <img src="{{ asset('images/laptify.png') }}" alt="Laptify Logo" class="w-3/4">
        </div>

        <!-- Right Section -->
        <div class="w-1/2 flex justify-center items-center">
            <form method="POST" action="{{ route('password.store') }}" class="w-3/4">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Header -->
                <div class="text-center mb-6">
                    <h1 class="text-2xl font-bold text-[#112B3C]">Create New Password</h1>
                    <p class="text-sm text-gray-600">Please choose a password that hasn't been used before. Must be at least 8 characters.</p>
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <x-primary-button class="w-full bg-[#112B3C] text-white py-2 rounded-lg shadow-lg hover:bg-[#0A1E27]">
                        {{ __('Reset Password') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
