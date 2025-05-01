<div>
    <main class="flex-1 p-6 overflow-hidden pt-30">
        {{-- RAMEN --}}
        <section class="m-12">
            <img src="{{ asset('images/ramen/bg-ramen.png') }}" alt="Ramen Banner" class="w-full h-auto shadow-md mb-6">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($ramenItems as $item)
                    <div
                        wire:click="openPopup({{ $item->id }})"
                        class="bg-[#F0E1C5] p-4 shadow-md rounded-md text-center transition transform duration-300 hover:scale-110 hover:-rotate-3 hover:shadow-xl cursor-pointer"
                    >
                        <img src="{{ asset('images/ramen/' . str_replace(' ', '_', strtolower($item->name)) . '.png') }}" alt="{{ $item->name }}" class="mx-auto mb-10 rounded-full w-32 h-32 object-cover">
                        <h3 class="text-3xl font-menu leading-tight">{{ $item->name }}</h3>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- SUSHI --}}
        <section class="m-12">
            <img src="{{ asset('images/sushi/bg-sushi.png') }}" alt="Sushi Banner" class="w-full h-auto shadow-md mb-6">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($sushiItems as $item)
                    <div
                        wire:click="openPopup({{ $item->id }})"
                        class="bg-[#F0E1C5] p-4 shadow-md rounded-md text-center transition transform duration-300 hover:scale-110 hover:-rotate-3 hover:shadow-xl cursor-pointer"
                    >
                        <img src="{{ asset('images/sushi/' . str_replace(' ', '_', strtolower($item->name)) . '.png') }}" alt="{{ $item->name }}" class="mx-auto mb-10 rounded-full w-48 h-48 object-cover">
                        <h3 class="text-3xl font-menu leading-tight">{{ $item->name }}</h3>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- BEVERAGES --}}
        <section class="m-12">
            <img src="{{ asset('images/beverages/bg-beverages.png') }}" alt="Beverages Banner" class="w-full h-auto shadow-md mb-6">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($beverageItems as $item)
                    <div
                        wire:click="openPopup({{ $item->id }})"
                        class="bg-[#F0E1C5] p-4 shadow-md rounded-md text-center transition transform duration-300 hover:scale-110 hover:-rotate-3 hover:shadow-xl cursor-pointer"
                    >
                        <img src="{{ asset('images/beverages/' . str_replace(' ', '_', strtolower($item->name)) . '.png') }}" alt="{{ $item->name }}" class="mx-auto mb-10 rounded-full w-48 h-48 object-cover">
                        <h3 class="text-3xl font-menu leading-tight">{{ $item->name }}</h3>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    {{-- POPUP OVERLAY --}}
    @if ($showOverlay)
    <div class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40 flex justify-center items-center
        transition-all duration-300 ease-in-out
        {{ $closing ? 'pointer-events-none animate-fadeOut' : 'pointer-events-auto animate-fadeIn' }}">
        
        {{-- Popup Box --}}
        @if ($showPopup || $closing)
            <div class="bg-white rounded-2xl shadow-xl w-[95%] max-w-4xl flex flex-col md:flex-row overflow-hidden relative
                {{ $closing ? 'animate-zoomOut' : 'animate-zoomIn' }}">
                
                {{-- Close Button --}}
                <button wire:click="closePopup" class="absolute top-3 right-4 text-black text-4xl font-bold z-10 cursor-pointer">
                    &times;
                </button>

                {{-- Popup Content --}}
                <div class="flex w-full">

                    {{-- Image Section --}}
                    <div class="w-full md:w-1/2 flex justify-center items-center p-6 bg-white">
                        <img src="{{ $selectedItem['image'] ?? '' }}" alt="{{ $selectedItem['name'] ?? 'Item Image' }}" class="w-64 h-64 object-cover">
                    </div>

                    {{-- Info Section --}}
                    <div class="w-full md:w-1/2 bg-[#F0E1C5] p-6 flex flex-col justify-center">
                        <h2 class="text-4xl font-menu font-bold text-[#5D3F00] mb-4">
                            {{ $selectedItem['name'] ?? '' }}
                        </h2>
                        <p class="font-umum text-gray-600 mb-6">
                            {{ $selectedItem['description'] ?? '' }}
                        </p>
                        <p class="font-umum text-lg font-bold text-[#5D3F00] mb-4">
                            Price: Rp. {{ number_format($selectedItem['price'] ?? 0, 0, ',', '.') }}
                        </p>
                        @if($quantity > 0)
                            <p class="font-umum text-lg font-bold mb-6">
                                Subtotal: Rp. {{ number_format( ($selectedItem['price'] ?? 0) * $quantity, 0, ',', '.') }}
                            </p>
                        @endif

                        {{-- Action Buttons --}}
                        <div class="flex items-center space-x-4">
                            @if (!$showCounter)
                                {{-- Add to Cart --}}
                                <button wire:click="addToCart" class="bg-[#688B58] font-umum text-xl py-3 px-6 rounded-full hover:bg-[#90C290] hover:text-black transition w-max cursor-pointer">
                                    Add to Cart
                                </button>
                            @else
                                {{-- Quantity Counter --}}
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center space-x-2">
                                        <button wire:click="decrementQuantity" class="bg-[#D08E5A] text-white text-2xl w-8 h-8 rounded-full hover:bg-[#5D3F00]">
                                            -
                                        </button>
                                        <span class="text-2xl font-bold w-6 text-center">
                                            {{ $quantity }}
                                        </span>
                                        <button wire:click="incrementQuantity" class="bg-[#D08E5A] text-white text-2xl w-8 h-8 rounded-full hover:bg-[#5D3F00]">
                                            +
                                        </button>
                                    </div>

                                    {{-- Save to Cart --}}
                                    <button wire:click="saveItemToCart" class="bg-[#688B58] font-umum text-xl py-2 px-4 rounded-full hover:bg-[#90C290] hover:text-black transition cursor-pointer">
                                        Save
                                    </button>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        @endif

    </div>
    @endif

    {{-- STYLE --}}
    <style>
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes zoomIn {
        from { opacity: 0; transform: scale(0.8); }
        to { opacity: 1; transform: scale(1); }
    }
    @keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; }
    }
    @keyframes zoomOut {
        from { opacity: 1; transform: scale(1); }
        to { opacity: 0; transform: scale(0.8); }
    }

    .animate-fadeIn {
        animation: fadeIn 0.3s ease-out forwards;
    }
    .animate-zoomIn {
        animation: zoomIn 0.3s ease-out forwards;
    }
    .animate-fadeOut {
        animation: fadeOut 0.3s ease-out forwards;
    }
    .animate-zoomOut {
        animation: zoomOut 0.3s ease-out forwards;
    }
    </style>
</div>
