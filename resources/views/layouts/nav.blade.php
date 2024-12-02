<!-- Tambahkan Link Google Fonts di sini -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jua&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<nav x-data="{ open: false }" class="bg-iceblue">
    <!-- Primary Navigation Menu -->
    <div class="max-w-full mx-auto px-8 sm:px-10 lg:px-12">
        <div class="flex justify-between h-20 items-center">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ Auth::user()->usertype == 'admin' ? route('admin.dashboard') : route('dashboard') }}">
                        <img src="{{ asset('images/laptify.png') }}" alt="Logo" class="h-16 w-auto">
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="ml-24 relative">
                    <input type="text" placeholder=" " class="rounded-full py-1 px-4 bg-creamy border-2 border-black focus:outline-none focus:ring-2 focus:ring-blue-500 w-80">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="absolute top-1/2 left-3 transform -translate-y-1/2 w-5 h-5 text-black">>
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="ml-24 hidden space-x-16 sm:flex items-center">
                <x-nav-link :href="Auth::user()->usertype == 'admin' ? route('admin.dashboard') : route('dashboard')" :active="Auth::user()->usertype == 'admin' ? request()->routeIs('admin.dashboard'): request()->routeIs('dashboard')">
                    {{ __('Home') }}
                </x-nav-link>

                {{--Admin Links--}}
                @if (Auth::user()->usertype == 'admin')
                <x-nav-link href="/crud-table" :active="request()->routeIs('/crud-table')">
                    {{ __('Product') }}
                </x-nav-link>

                <x-nav-link href="admin/category" :active="request()->routeIs('admin.category')">
                    {{ __('Category') }}
                </x-nav-link>

                <x-nav-link href="admin/user" :active="request()->routeIs('admin.user')">
                    {{ __('User') }}
                </x-nav-link>

                @endif

                {{--User Links--}}
                @if (Auth::user()->usertype == 'user')
                <!--<x-nav-link href="profile" :active="request()->routeIs('profile.edit')">
                    {{ __('My Profile') }}
                </x-nav-link>-->

                <x-nav-link href="aboutus" :active="request()->routeIs('user.aboutus')">
                    {{ __('About Us') }}
                </x-nav-link>

                <x-nav-link href="product" :active="request()->routeIs('user.product')">
                    {{ __('Product') }}
                </x-nav-link>

                <x-nav-link href="/matching-form" :active="request()->routeIs('/matching-form')">
                    {{ __('Find Yours') }}
                </x-nav-link>

                @endif

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex items-center ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="url('/')">
                            {{ __('Home') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
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

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            {{--Admin Links--}}
            @if (Auth::user()->usertype == 'admin')
            <x-responsive-nav-link href="/crud-table" :active="request()->routeIs('/crud-table')">
                {{ __('Product') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="admin/category" :active="request()->routeIs('admin.category')">
                {{ __('Category') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="admin/user" :active="request()->routeIs('admin.user')">
                {{ __('User') }}
            </x-responsive-nav-link>

            @endif

            {{--User Links--}}
            @if (Auth::user()->usertype == 'user')
            <x-responsive-nav-link href="/matching-form" :active="request()->routeIs('/matching-form')">
                {{ __('Find Yours') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="favorite" :active="request()->routeIs('user.favorite')">
                {{ __('Favorite') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="profile" :active="request()->routeIs('profile.edit')">
                {{ __('My Profile') }}
            </x-responsive-nav-link>

            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="url('/')">
                    {{ __('Home') }}
                </x-responsive-nav-link>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
