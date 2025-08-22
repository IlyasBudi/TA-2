<nav x-data="{ 
    mobileOpen: false, 
    profileOpen: false, 
    scrolled: false 
}" 
x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })" 
:class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-lg border-b border-gray-100' : 'bg-transparent'" 
class="fixed w-full top-0 z-50 transition-all duration-500">
    
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center h-16">
            
            <!-- Logo Section -->
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-3 group">
                    <div class="relative">
                        <!-- <img src="{{ asset('/penyewatemplate') }}/assets/img/baru2/logo-xyz.svg" 
                             alt="PO XYZ" 
                             class="h-10 w-auto transition-transform duration-300 group-hover:scale-105"> -->
                        <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg opacity-0 group-hover:opacity-20 blur transition-opacity duration-300"></div>
                    </div>
                    <div class="hidden sm:block">
                        <span class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                            PO XYZ
                        </span>
                        <div class="text-xs text-gray-500 -mt-1">Pariwisata</div>
                    </div>
                </a>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-1">
                <a href="/" 
                   class="relative px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300 group {{ request()->is('/') ? 'text-indigo-600' : 'text-gray-700 hover:text-indigo-600' }}">
                    <span class="relative z-10">Home</span>
                    @if(request()->is('/'))
                        <div class="absolute inset-0 bg-indigo-50 rounded-lg"></div>
                    @endif
                    <div class="absolute inset-0 bg-indigo-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
                
                <a href="/bookingpage" 
                   class="relative px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300 group {{ request()->is('bookingpage') ? 'text-indigo-600' : 'text-gray-700 hover:text-indigo-600' }}">
                    <span class="relative z-10">Booking</span>
                    @if(request()->is('bookingpage'))
                        <div class="absolute inset-0 bg-indigo-50 rounded-lg"></div>
                    @endif
                    <div class="absolute inset-0 bg-indigo-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
                
                <a href="/about" 
                   class="relative px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300 group {{ request()->is('about') ? 'text-indigo-600' : 'text-gray-700 hover:text-indigo-600' }}">
                    <span class="relative z-10">About</span>
                    @if(request()->is('about'))
                        <div class="absolute inset-0 bg-indigo-50 rounded-lg"></div>
                    @endif
                    <div class="absolute inset-0 bg-indigo-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
                
                <a href="/listharga" 
                   class="relative px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300 group {{ request()->is('listharga') ? 'text-indigo-600' : 'text-gray-700 hover:text-indigo-600' }}">
                    <span class="relative z-10">Pricing</span>
                    @if(request()->is('listharga'))
                        <div class="absolute inset-0 bg-indigo-50 rounded-lg"></div>
                    @endif
                    <div class="absolute inset-0 bg-indigo-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
                <a href="/maps" 
                   class="relative px-4 py-2 text-sm font-medium rounded-lg transition-all duration-300 group {{ request()->is('listharga') ? 'text-indigo-600' : 'text-gray-700 hover:text-indigo-600' }}">
                    <span class="relative z-10">Maps</span>
                    @if(request()->is('maps'))
                        <div class="absolute inset-0 bg-indigo-50 rounded-lg"></div>
                    @endif
                    <div class="absolute inset-0 bg-indigo-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
            </div>
            
            <!-- Auth Section -->
            <div class="flex items-center space-x-3">
                @auth
                    <div class="relative">
                        <button @click="profileOpen = !profileOpen" 
                                class="flex items-center space-x-2 bg-gray-100 hover:bg-gray-200 px-3 py-2 rounded-lg transition-colors duration-200">
                            <div class="w-7 h-7 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                                <span class="text-xs font-semibold text-white">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </span>
                            </div>
                            <span class="hidden sm:block text-sm font-medium text-gray-700">
                                {{ Str::limit(Auth::user()->name, 12) }}
                            </span>
                            <svg class="w-4 h-4 text-gray-500 transition-transform duration-200" 
                                 :class="profileOpen ? 'rotate-180' : ''" 
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <div x-show="profileOpen" 
                             @click.away="profileOpen = false"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2"
                             x-cloak>
                            <a href="/profile/{{ Auth::user()->id }}" 
                               class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                                <i class="fas fa-user-circle mr-3 text-gray-400"></i>
                                Profile
                            </a>
                            <hr class="my-1 border-gray-100">
                            <a href="/logout" 
                               class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors duration-150">
                                <i class="fas fa-sign-out-alt mr-3 text-red-400"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                @endauth
                
                @guest
                    <a href="/login" 
                       class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-medium px-4 py-2 rounded-lg transition-all duration-200 transform hover:scale-105 shadow-md">
                        Masuk
                    </a>
                @endguest
                
                <!-- Mobile Menu Toggle -->
                <button @click="mobileOpen = !mobileOpen" 
                        class="lg:hidden p-2 rounded-lg text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition-colors duration-200">
                    <svg class="w-5 h-5" x-show="!mobileOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="w-5 h-5" x-show="mobileOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div x-show="mobileOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         class="lg:hidden bg-white/95 backdrop-blur-md border-t border-gray-100"
         x-cloak>
        <div class="px-4 py-4 space-y-2">
            <a href="/" 
               class="block px-3 py-2 rounded-lg text-base font-medium {{ request()->is('/') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50' }} transition-colors duration-200">
                Home
            </a>
            <a href="/bookingpage" 
               class="block px-3 py-2 rounded-lg text-base font-medium {{ request()->is('bookingpage') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50' }} transition-colors duration-200">
                Booking
            </a>
            <a href="/about" 
               class="block px-3 py-2 rounded-lg text-base font-medium {{ request()->is('about') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50' }} transition-colors duration-200">
                About
            </a>
            <a href="/listharga" 
               class="block px-3 py-2 rounded-lg text-base font-medium {{ request()->is('listharga') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50' }} transition-colors duration-200">
                Harga
            </a>
        </div>
    </div>
</nav>