<!DOCTYPE html>
<html lang="en" class="scroll-smooth h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menya菏屋</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .keren-ramen {
            animation: gerak 60s linear infinite;
            animation-play-state: running;
        }

        .keren-sushi {
            animation: gerakKanan 60s linear infinite;
            animation-play-state: running;
        }

        .keren-drinks {
            animation: gerak 60s linear infinite;
            animation-play-state: running;
        }

        @keyframes gerak {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(calc(-100% - 32px));
            }
        }

        @keyframes gerakKanan {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(0%);
            }
        }

        body {
            background-color: #F0E1C5;
        }

        nav {
            transition: transform 0.4s ease;
        }
        main {
            transition: transform 0.4s ease;
        }

        .max-w-xl, main img {
            transition: transform 0.4s ease;
        }

        @keyframes flipHorizontal {
            from {
                transform: rotateY(0deg);
            }
            to {
                transform: rotateY(360deg);
            }
        }

        .flip-horizontal {
            animation: flipHorizontal 1s ease-in-out;
        }

        @keyframes blockSelect {
            0% {
                background-size: 0% 100%;
            }
            100% {
                background-size: 100% 100%;
            }
        }

        .highlight {
            background-image: linear-gradient(to right, #D08E5A 100%, #D08E5A 100%);
            background-repeat: no-repeat;
            background-size: 0% 100%;
            color: white;
            padding: 0 4px;
            border-radius: 4px;
            animation: blockSelect 1.5s ease-out forwards;
            animation-delay: 0.5s;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen overflow-x-hidden">
    <!-- Navbar-->
    <nav class="fixed top-6 left-0 right-0 mx-12 z-50 backdrop-blur-md bg-white/70 shadow-lg rounded-2xl">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-4xl font-bold mb-4 mt-4 cursor-pointer text-[#5D3F00]">Menya菏屋</a>

                <div class="hidden md:flex space-x-10 font-bold">
                    <a href="{{ route('home') }}"
                        class="relative text-2xl font-medium text-[#5D3F00]
                        after:content-[''] after:absolute after:left-0 after:-bottom-1 after:w-full after:h-1 after:bg-[#5D3F00] after:rounded-full">
                        HOME
                    </a>

                    <a href="{{ route('menu') }}"
                        class="relative text-2xl font-medium text-[#D08E5A] hover:text-[#5D3F00] 
                        after:content-[''] after:absolute after:left-0 after:-bottom-1 after:w-0 after:h-1 after:bg-[#5D3F00] hover:after:w-full after:transition-all after:duration-300 after:rounded-full">
                        MENU
                    </a>

                    <a href="{{ route('chatbot') }}"
                        class="relative text-2xl font-medium text-[#D08E5A] hover:text-[#5D3F00] 
                        after:content-[''] after:absolute after:left-0 after:-bottom-1 after:w-0 after:h-1 after:bg-[#5D3F00] hover:after:w-full after:transition-all after:duration-300 after:rounded-full">
                        CHATBOT
                    </a>

                    <a href="{{ route('checkout') }}" class="relative flex items-center">
                        <span class="material-icons text-[#D08E5A] hover:text-[#5D3F00] text-2xl">
                            shopping_cart
                        </span>
                    </a>
                </div>

                <div class="md:hidden">
                    <button id="menu-toggle" class="text-gray-700 focus:outline-none">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div id="mobile-menu"
                class="absolute left-0 right-0 top-full z-40 md:hidden max-h-0 opacity-0 overflow-hidden bg-white shadow-xl rounded-b-xl transition-all duration-300 ease-in-out">
                <a href="{{ route('home') }}" class="block px-6 py-4 text-lg font-umum hover:bg-gray-100">HOME</a>
                <a href="{{ route('menu') }}" class="block px-6 py-4 text-lg font-umum hover:bg-gray-100">MENU</a>
                <a href="{{ route('chatbot') }}" class="block px-6 py-4 text-lg font-umum hover:bg-gray-100">CHATBOT</a>
                <a href="{{ route('checkout') }}" class="block px-6 py-4 text-lg font-umum hover:bg-gray-100">CHECKOUT</a>
            </div>
        </div>
    </nav>

    <main class="relative flex items-center justify-center min-h-screen overflow-hidden">
        <div class="absolute inset-0 bg-black"></div>

        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('/images/homebg.png'); background-repeat: no-repeat; background-size: cover;"></div>

        <div class="relative z-10 container mx-auto px-6 md:px-12 flex flex-col md:flex-row items-center justify-center text-white">
            <div class="w-[90%] max-w-[600px] text-center md:mr-12 px-8 py-8 order-2 md:order-1 text-white">
                <h1 class="text-5xl mb-6 font-menu text-center">Irasshaimase!</h1>
                <p class="text-2xl leading-relaxed mb-4 font-umum font-bold">
                    Dive into a world of authentic flavors, from hearty bowls of 
                    <span class="highlight">ramen</span> to fresh delicate 
                    <span class="highlight">sushi</span> and refreshing handcrafted 
                    <span class="highlight">drinks</span>
                </p>

                <p class="text-lg leading-relaxed mb-6 font-umum text-center">
                    Welcome to <span class="font-bold">Menya菏屋</span>, where every dish tells a story
                </p>

                <div class="flex justify-center">
                    <a href="{{ route('menu') }}" class="inline-block text-lg font-bold text-[#5D3F00] bg-[#F0E1C5] py-2 px-6 rounded-lg shadow-md hover:bg-[#D08E5A] hover:text-white transition-all duration-300">
                        Menu
                    </a>
                </div>

                <div class="flex justify-center mt-24">
                    <p class="font-umum text-white text-2xl animate-bounce">Scroll Down ↓</p>
                </div>
            </div>
        </div>
    </main>
    
    <section class="bg-[#F0E1C5] mt-12">
        <div class="px-6 w-full max-w-7xl mx-auto">
            <div class="flex flex-col gap-8">
            
            <h2 class="text-4xl font-menu text-[#5D3F00]">Get more with our deals</h2>

            <div class="flex flex-col md:flex-row gap-8">
                <div class="flex-1 shadow-lg rounded-lg overflow-hidden">
                <img src="/images/promo1.png" alt="Promo 1" class="w-full h-auto object-cover">
                </div>

                <div class="flex-1 shadow-lg rounded-lg overflow-hidden">
                <img src="/images/promo2.png" alt="Promo 2" class="w-full h-auto object-cover">
                </div>
            </div>

            </div>
        </div>
    </section>

    <section class="bg-[#F0E1C5] py-12 mb-12">
        <div class="px-6 max-w-7xl mx-auto">
            <h2 class="text-4xl font-menu text-[#5D3F00] mb-8">Frequent Faves</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="flex flex-col items-center shadow-lg rounded-lg overflow-hidden bg-[#F0E1C5] p-4">
                    <img src="/images/ramen/chicken_sashu_ramen.png" alt="Chicken Sashu Ramen" class="w-48 aspect-square object-cover mb-4">
                    <h3 class="text-lg font-umum font-bold text-[#5D3F00] text-center">Chicken Sashu Ramen</h3>
                </div>

                <div class="flex flex-col items-center shadow-lg rounded-lg overflow-hidden bg-[#F0E1C5] p-4">
                    <img src="/images/ramen/chicken_karage_ramen.png" alt="Chicken Karage Ramen" class="w-48 aspect-square object-cover mb-4">
                    <h3 class="text-lg font-umum font-bold text-[#5D3F00] text-center">Chicken Karage Ramen</h3>
                </div>

                <div class="flex flex-col items-center shadow-lg rounded-lg overflow-hidden bg-[#F0E1C5] p-4">
                    <img src="/images/ramen/chicken_katsu_ramen.png" alt="Chicken Katsu Ramen" class="w-48 aspect-square object-cover mb-4">
                    <h3 class="text-lg font-umum font-bold text-[#5D3F00] text-center">Chicken Katsu Ramen</h3>
                </div>

                <div class="flex flex-col items-center shadow-lg rounded-lg overflow-hidden bg-[#F0E1C5] p-4">
                    <img src="/images/ramen/dumpling_ramen.png" alt="Dumpling Ramen" class="w-48 aspect-square object-cover mb-4">
                    <h3 class="text-lg font-umum font-bold text-[#5D3F00] text-center">Dumpling Ramen</h3>
                </div>
            </div>
        </div>
    </section>

    <div class="flex overflow-hidden whitespace-nowrap gap-16 cursor-pointer text-white hover:text-[#688B58] mb-12 transition-colors duration-300">
        <div class="inline-flex whitespace-nowrap gap-16 relative keren-ramen font-umum">
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                DELICIOUS RAMEN
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                DELICIOUS RAMEN
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                DELICIOUS RAMEN
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                DELICIOUS RAMEN
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                DELICIOUS RAMEN
            </p>
        </div>
        <div class="inline-flex whitespace-nowrap gap-16 relative keren-ramen font-umum">
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                DELICIOUS RAMEN
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                DELICIOUS RAMEN
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                DELICIOUS RAMEN
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                DELICIOUS RAMEN
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                DELICIOUS RAMEN
            </p>
        </div>
        <div class="inline-flex whitespace-nowrap gap-16 relative keren-ramen font-umum">
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                DELICIOUS RAMEN
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                DELICIOUS RAMEN
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                DELICIOUS RAMEN
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                DELICIOUS RAMEN
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                DELICIOUS RAMEN
            </p>
        </div>
    </div>

    <div class="flex overflow-hidden whitespace-nowrap gap-16 cursor-pointer text-white hover:text-[#688B58] mb-12 transition-colors duration-300">
        <div class="inline-flex whitespace-nowrap gap-16 relative keren-sushi font-umum">
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                HEALTHY SUSHI
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                HEALTHY SUSHI
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                HEALTHY SUSHI
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                HEALTHY SUSHI
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                HEALTHY SUSHI
            </p>
        </div>
        <div class="inline-flex whitespace-nowrap gap-16 relative keren-sushi font-umum">
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                HEALTHY SUSHI
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                HEALTHY SUSHI
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                HEALTHY SUSHI
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                HEALTHY SUSHI
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                HEALTHY SUSHI
            </p>
        </div>
        <div class="inline-flex whitespace-nowrap gap-16 relative keren-sushi font-umum">
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                HEALTHY SUSHI
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                HEALTHY SUSHI
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                HEALTHY SUSHI
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                HEALTHY SUSHI
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                HEALTHY SUSHI
            </p>
        </div>
    </div>

    <div class="flex overflow-hidden whitespace-nowrap gap-16 cursor-pointer text-white hover:text-[#688B58] mb-24 transition-colors duration-300">
        <div class="inline-flex whitespace-nowrap gap-16 relative keren-drinks font-umum">
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                FRESH DRINKS
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                FRESH DRINKS
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                FRESH DRINKS
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                FRESH DRINKS
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                FRESH DRINKS
            </p>
        </div>
        <div class="inline-flex whitespace-nowrap gap-16 relative keren-drinks font-umum">
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                FRESH DRINKS
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                FRESH DRINKS
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                FRESH DRINKS
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                FRESH DRINKS
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                FRESH DRINKS
            </p>
        </div>
        <div class="inline-flex whitespace-nowrap gap-16 relative keren-drinks font-umum">
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                FRESH DRINKS
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                FRESH DRINKS
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                FRESH DRINKS
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                FRESH DRINKS
            </p>
            <p class="text-5xl md:text-6xl lg:text-8xl font-semibold">
                FRESH DRINKS
            </p>
        </div>
    </div>

    <div class="text-center py-16">
        <h2 class="text-6xl font-bold text-[#1a1a1a] uppercase tracking-wide">
            We're All Around Indonesia<br>Just To Be With You
        </h2>

        <img src="/images/indonesia-map.png" alt="Map of Indonesia" class="mt-6 mx-auto w-[100%] max-w-[900px] object-contain pointer-events-none opacity-80" />
    </div>

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

    @stack('scripts')
    <script>
        const toggleBtn = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        toggleBtn.addEventListener('click', () => {
            const isOpen = mobileMenu.classList.contains('max-h-0');

            if (isOpen) {
                mobileMenu.classList.remove('max-h-0', 'opacity-0');
                mobileMenu.classList.add('max-h-96', 'opacity-100');
            } else {
                mobileMenu.classList.add('max-h-0', 'opacity-0');
                mobileMenu.classList.remove('max-h-96', 'opacity-100');
            }
        });

        const ramenGroups = document.querySelectorAll('.keren-ramen');

        ramenGroups.forEach(group => {
            group.addEventListener('mouseenter', () => {
                ramenGroups.forEach(g => g.style.animationPlayState = 'paused');
            });
            group.addEventListener('mouseleave', () => {
                ramenGroups.forEach(g => g.style.animationPlayState = 'running');
            });
        });

        const sushiGroups = document.querySelectorAll('.keren-sushi');

        sushiGroups.forEach(group => {
            group.addEventListener('mouseenter', () => {
                sushiGroups.forEach(g => g.style.animationPlayState = 'paused');
            });
            group.addEventListener('mouseleave', () => {
                sushiGroups.forEach(g => g.style.animationPlayState = 'running');
            });
        });

        const drinksGroups = document.querySelectorAll('.keren-drinks');

        drinksGroups.forEach(group => {
            group.addEventListener('mouseenter', () => {
                drinksGroups.forEach(g => g.style.animationPlayState = 'paused');
            });
            group.addEventListener('mouseleave', () => {
                drinksGroups.forEach(g => g.style.animationPlayState = 'running');
            });
        });
    </script>
</body>
</html>
