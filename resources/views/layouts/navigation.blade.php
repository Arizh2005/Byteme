<nav x-data="{ open: false }" class="bg-iceblue">
    <div class="max-w-full mx-auto px-8 sm:px-10 lg:px-12">
    <div class="flex justify-between h-20 items-center">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="shrink-0 flex items-center mr-24 relative">
                        <a href="{{ Auth::check() && Auth::user()->usertype == 'admin' ? route('admin.dashboard') : (Auth::check() ? route('dashboard') : url('/')) }}">
                            <img src="{{ asset('images/laptify.png') }}" alt="Logo" class="h-16 w-auto">
                        </a>
                    </div>

                    <!-- Search Bar -->

                </div>

                <!-- Links -->
                <div class="ml-auto hidden space-x-16 sm:flex items-center nav-links">
                    <x-nav-link :href="route('login')" class="text-lg font-semibold">{{ __('Home') }}</x-nav-link>
                    <x-nav-link href="about" class="text-lg font-semibold">{{ __('About Us') }}</x-nav-link>
                    <x-nav-link href="products" class="text-lg font-semibold">{{ __('Products') }}</x-nav-link>
                    <x-nav-link href="find" class="text-lg font-semibold">{{ __('Find Yours') }}</x-nav-link>
                </div>

                <!-- Login and Register Links on the Right Side -->
                <div class="ml-auto hidden space-x-8 sm:flex items-center relative">
                    @if (Auth::check())
                        <x-nav-link :href="Auth::user()->usertype == 'admin' ? route('admin.dashboard') : route('dashboard')" :active="Auth::user()->usertype == 'admin' ? request()->routeIs('admin.dashboard') : request()->routeIs('dashboard')">
                            {{ __('Home') }}
                        </x-nav-link>

                        @if (Auth::user()->usertype == 'admin')
                            <x-nav-link href="admin/product" :active="request()->routeIs('crud')">{{ __('Product') }}</x-nav-link>
                            <x-nav-link href="admin/category" :active="request()->routeIs('admin.category')">{{ __('Category') }}</x-nav-link>
                            <x-nav-link href="admin/user" :active="request()->routeIs('admin.user')">{{ __('User') }}</x-nav-link>
                        @else
                            <x-nav-link href="simulation" :active="request()->routeIs('user.simulation')">{{ __('Simulation') }}</x-nav-link>
                            <x-nav-link href="favorite" :active="request()->routeIs('user.favorite')">{{ __('Favorite') }}</x-nav-link>
                            <x-nav-link href="profile" :active="request()->routeIs('profile.edit')">{{ __('My Profile') }}</x-nav-link>
                        @endif
                    @else
                        <x-nav-link href="{{ route('login') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="absolute top-1/2 right-1 transform -translate-y-1/2 w-6 h-6 text-black">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        </x-nav-link>
                        <x-nav-link href="{{ route('register') }}"></x-nav-link>
                    @endif
                </div>

                <!-- Dropdown for smaller screens (mobile) -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-blue-500 focus:outline-none focus:bg-blue-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
