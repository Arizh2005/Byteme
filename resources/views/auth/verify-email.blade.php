<x-app-layout>
    <div class="flex min-h-screen items-center justify-center bg-gray-50">
        <!-- Left Section: Image and Logo -->
        <div class="w-1/2 bg-[#FFF3D8] flex items-center justify-center p-10">
            <img src="images/laptify.png" alt="Laptify Logo" class="max-w-full h-auto" />
        </div>

        <!-- Right Section: Text and Button -->
        <div class="w-1/2 flex flex-col items-center justify-center p-8 space-y-6">
            <!-- Icon and Title -->
            <div class="flex flex-col items-center space-y-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V8a2 2 0 00-.72-1.54M5 19a2 2 0 002-2v0M5 19V8a2 2 0 00-.72-1.54M21 8v9a2 2 0 002 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
                </svg>
                <h2 class="text-2xl font-bold text-gray-800">Check Your Mail</h2>
            </div>

            <!-- Description Text -->
            <p class="text-center text-gray-600 text-sm max-w-xs">
                We've sent a password reset link to your email. Please check your email and follow the instructions to reset your password.
            </p>

            <!-- Button -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Open Email Page
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
