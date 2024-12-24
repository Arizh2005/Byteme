<x-guest-layout>
    <div class="flex h-screen">
        <!-- Left Side (Registration Form) -->
        <div class="w-7/12 flex justify-center items-center">
            <div class="w-3/4 max-w-md">
                <h1 class="text-5xl text-center font-bold text-blue-900 mb-2">Get Started</h1>
                <p class="text-gray-600 text-center mb-6">Welcome to Laptify. Let's create your account</p>

                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf

                    <!-- Username -->
                    <div>
                        <x-input-label for="name" :value="__('Username')" />
                        <x-text-input id="name" class="block mt-1 w-full h-8 border border-gray-400" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full h-8 border border-gray-400" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full h-8 border border-gray-400" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full h-8 border border-gray-400" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <div class="row">
                        <div class="w-full">
                            <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}">
                                @error('g-recaptcha-response')
                                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Sign Up Button -->
                    <div class="flex items-center justify-center mt-6">
                        <x-primary-button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 justify-center text-base rounded w-full h-12">
                            {{ __('Sign Up') }}
                        </x-primary-button>
                    </div>



                    <p class="mt-4 text-center text-sm text-gray-500">Already have an account? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a></p>
                </form>


                @push('scripts')
        <!--<script>
        function onSubmit(token) {
          document.getElementById("registerForm").submit();
        }
        </script>-->
                <script>
                    function onClick(e) {
                    e.preventDefault();
                    grecaptcha.ready(function() {
                        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: 'register'}).then(function(token) {
                            document.getElementById("g-recaptcha-response").value = token;
                            document.getElementById("registerForm").submit();
                        });
                    });
                    }
                </script>
            @endpush
            </div>
        </div>

        <!-- Right Side (Logo and Design) -->
        <div class="w-5/12 bg-yellow-100 flex justify-center items-center">
            <div class="text-center">
                <img src="{{ asset('images/laptify.png') }}" alt="Laptify Logo" class="mb-4 mx-auto w-80 h-auto"> <!-- Ganti dengan URL logo -->
            </div>
        </div>
    </div>
</x-guest-layout>

