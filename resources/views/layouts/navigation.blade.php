<nav x-data="{ open: false }" class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo et Navigation -->
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('tickets.index') }}" class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-blue-500 bg-clip-text text-transparent">
                        🎫 HelpDesk Pro
                    </a>
                </div>
                
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex sm:items-center">
                    <a href="{{ route('tickets.index') }}" 
                       class="{{ request()->routeIs('tickets.*') ? 'text-purple-600 border-b-2 border-purple-600' : 'text-gray-600 hover:text-purple-600' }} px-3 py-2 text-sm font-medium transition">
                        <i class="fas fa-tickets mr-1"></i> Tickets
                    </a>
                    
                    @if(Auth::user()->email === 'admin@admin.com')
                        <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-semibold">
                            <i class="fas fa-crown mr-1"></i> ADMIN
                        </span>
                    @endif
                </div>
            </div>

            <!-- Profil -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-3 text-gray-700 hover:text-purple-600 focus:outline-none">
                        <div class="w-8 h-8 bg-gradient-to-r from-purple-600 to-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="font-medium">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>

                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2 z-50">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-purple-50 hover:text-purple-600">
                            <i class="fas fa-user mr-2"></i> Profil
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-purple-50 hover:text-purple-600">
                                <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>