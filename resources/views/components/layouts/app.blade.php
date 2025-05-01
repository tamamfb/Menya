
<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menya菏屋</title>

    @vite(['resources/css/app.css', 'resources/js/app.js']) 
    @livewireStyles

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        body {
            background-color: #F0E1C5;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
    @if(!in_array(Route::currentRouteName(), ['login', 'register', 'payment']))
    <!-- Navbar-->
    <nav id="navbar" class="fixed top-6 left-0 right-0 mx-12 z-50 transition-transform duration-300 backdrop-blur-md bg-white/70 shadow-lg rounded-2xl">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-4xl font-bold mb-4 mt-4 cursor-pointer text-[#5D3F00]">Menya菏屋</a>

                <div class="hidden md:flex space-x-10 font-bold">
                    <!-- HOME -->
                    <a href="{{ route('home') }}"
                    class="relative text-2xl font-medium 
                        {{ request()->routeIs('home') ? 'text-[#5D3F00] after:w-full' : 'text-[#D08E5A] hover:text-[#5D3F00] after:w-0 hover:after:w-full' }}
                        after:content-[''] after:absolute after:left-0 after:-bottom-1 after:h-1 after:bg-[#5D3F00] after:rounded-full after:transition-all after:duration-300">
                        HOME
                    </a>

                    <!-- MENU -->
                    <a href="{{ route('menu') }}"
                    class="relative text-2xl font-medium 
                        {{ request()->routeIs('menu') ? 'text-[#5D3F00] after:w-full' : 'text-[#D08E5A] hover:text-[#5D3F00] after:w-0 hover:after:w-full' }}
                        after:content-[''] after:absolute after:left-0 after:-bottom-1 after:h-1 after:bg-[#5D3F00] after:rounded-full after:transition-all after:duration-300">
                        MENU
                    </a>

                    <!-- CHATBOT -->
                    <a href="{{ route('chatbot') }}"
                    class="relative text-2xl font-medium 
                        {{ request()->routeIs('chatbot') ? 'text-[#5D3F00] after:w-full' : 'text-[#D08E5A] hover:text-[#5D3F00] after:w-0 hover:after:w-full' }}
                        after:content-[''] after:absolute after:left-0 after:-bottom-1 after:h-1 after:bg-[#5D3F00] after:rounded-full after:transition-all after:duration-300">
                        CHATBOT
                    </a>

                    <!-- CART ICON -->
                    <a href="{{ route('checkout') }}" class="relative flex items-center">
                        <span class="material-icons text-[#D08E5A] hover:text-[#5D3F00] text-2xl">
                            shopping_cart
                        </span>
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="menu-toggle" class="text-gray-700 focus:outline-none">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu"
                class="absolute left-0 right-0 top-full z-40 md:hidden max-h-0 opacity-0 overflow-hidden bg-white shadow-xl rounded-b-xl transition-all duration-300 ease-in-out">
                <a href="{{ route('home') }}" class="block px-6 py-4 text-lg font-umum hover:bg-gray-100">HOME</a>
                <a href="{{ route('menu') }}" class="block px-6 py-4 text-lg font-umum hover:bg-gray-100">MENU</a>
                <a href="{{ route('chatbot') }}" class="block px-6 py-4 text-lg font-umum hover:bg-gray-100">CHATBOT</a>
                <a href="{{ route('checkout') }}" class="block px-6 py-4 text-lg font-umum hover:bg-gray-100">CHECKOUT</a>
            </div>
        </div>
    </nav>
    @endif
    <main class="min-h-screen">
        {{ $slot }}
    </main>
    @if(!in_array(Route::currentRouteName(), ['login', 'register', 'chatbot']))
    <!-- footer -->
    <footer class="bg-black text-white mt-12">
        <div class=" font-umum container mx-auto px-6 py-6 flex justify-between items-center font-umum text-sm sm:text-base">
            <div class="text-2xl font-bold text-white">
                Menya麺屋
            </div>
            <div class="text-right">
                <span class="text-white text-xl">© Menya Indonesia 2025</span>
            </div>
        </div>
    </footer>
    @endif
    @livewireScripts
    @stack('scripts')
    <script>
        let lastScrollY = window.scrollY;
        const navbar = document.getElementById('navbar');
    
        window.addEventListener('scroll', () => {
            if (window.scrollY > lastScrollY) {
                // Scrolling Down -> Hide Navbar
                navbar.style.transform = 'translateY(-150%)';
            } else {
                // Scrolling Up -> Show Navbar
                navbar.style.transform = 'translateY(0)';
            }
            lastScrollY = window.scrollY;
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
    
            toggle.addEventListener('click', () => {
                const isOpen = mobileMenu.classList.contains('max-h-0');
    
                if (isOpen) {
                    mobileMenu.classList.remove('max-h-0', 'opacity-0');
                    mobileMenu.classList.add('max-h-screen', 'opacity-100');
                } else {
                    mobileMenu.classList.add('max-h-0', 'opacity-0');
                    mobileMenu.classList.remove('max-h-screen', 'opacity-100');
                }
            });
        });
    </script>    
</body>
</html>