<nav x-data="{ open: false }" class="bg-white-900 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-xl font-bold tracking-wide text-black hover:text-gray-300">
                    HotelBooking
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8"> <!-- Increased gap -->
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link :href="route('hotels.index')" :active="request()->routeIs('hotels.index')">
                    {{ __('Hotels') }}
                </x-nav-link>
                <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                    {{ __('Contact Us') }}
                </x-nav-link>
                @auth
        @if(auth()->user()->role === 'admin') 
            <x-nav-link >
                {{-- :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" --}}
                {{ __('Admin Panel') }}
            </x-nav-link>
        @endif
    @endauth
            </div>

            <!-- User Dropdown or Login/Register -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                <a href="{{ route('profile.edit') }}" class="mr-3">
                    <i class="fa-solid fa-user text-black"></i>
                </a>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-black hover:text-gray-300 focus:outline-none">
                                <!-- Profile Icon (Clickable) -->
                                
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="ml-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <div class="bg-white text-black py-2">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                @else
                    <x-nav-link :href="route('login')" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        {{ __('Login') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                        {{ __('Register') }}
                    </x-nav-link>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button @click="open = ! open" class="text-black hover:text-gray-300 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden bg-gray-800 text-white">
        <div class="pt-2 pb-3 space-y-2 px-4">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('hotels.index')" :active="request()->routeIs('hotels.index')">
                {{ __('Hotels') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                {{ __('Contact Us') }}
            </x-responsive-nav-link>
        </div>
        <div class="border-t border-gray-700 pt-4 pb-2">
            @auth
                <div class="px-4 text-white">
                    <div class="font-medium">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-gray-400">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1 px-4">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <x-responsive-nav-link :href="route('login')" class="bg-blue-500  text-center py-2 rounded-lg hover:bg-blue-600">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" class="bg-green-500 text-center py-2 rounded-lg hover:bg-green-600">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            @endauth
        </div>
    </div>
</nav>
