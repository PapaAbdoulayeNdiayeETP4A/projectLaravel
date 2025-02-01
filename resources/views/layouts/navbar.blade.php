<nav class="bg-gray-900 text-white shadow-lg">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="text-2xl font-bold text-gray-400 hover:text-blue-300">
            📱 SmartphoneApp
        </a>

        <!-- Liens Desktop -->
        <div class="hidden md:flex space-x-6">
            <a href="{{ url('/') }}" class="hover:text-blue-300">Accueil</a>
            
            @guest
                <a href="{{ route('login') }}" class="hover:text-blue-300">Se connecter</a>
                <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">S'inscrire</a>
            @else
                @if (Auth::user()->isAdmin())
                    <a href="{{ route('smartphones.create') }}" class="hover:text-green-400">Ajouter un smartphone</a>
                @endif
                <a href="#" class="hover:text-red-400" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
            @endguest
        </div>

        <!-- Bouton menu mobile -->
        <button id="menu-btn" class="md:hidden focus:outline-none">
            <svg class="w-8 h-8" fill="none" stroke="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <!-- Menu Mobile (caché par défaut) -->
    <div id="mobile-menu" class="hidden md:hidden bg-gray-800">
        <a href="{{ url('/') }}" class="block px-4 py-2 text-white hover:bg-gray-700">Accueil</a>
        
        @guest
            <a href="{{ route('login') }}" class="block px-4 py-2 text-white hover:bg-gray-700">Se connecter</a>
            <a href="{{ route('register') }}" class="block px-4 py-2 text-white hover:bg-blue-600">S'inscrire</a>
        @else
            @if (Auth::user()->isAdmin())
                <a href="{{ route('smartphones.create') }}" class="block px-4 py-2 text-green-400 hover:bg-green-700">Ajouter un smartphone</a>
            @endif
            <a href="#" class="block px-4 py-2 text-red-400 hover:bg-red-600"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Déconnexion
            </a>
        @endguest
    </div>
</nav>

<!-- Script Menu Mobile -->
<script>
    document.getElementById('menu-btn').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
