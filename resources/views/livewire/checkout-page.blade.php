<main class="flex-1">
    <div class="container mx-auto px-4 py-10 flex flex-col md:flex-row gap-10 overflow-hidden pt-40">
        <!-- Cart Items -->
        <div class="flex-1 space-y-6">
            @forelse($cart as $id => $item)
                <div class="cart-item flex items-center justify-between border-b pb-4">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="rounded-md w-20 h-20 object-cover">
                        <div>
                            <h3 class="font-menu font-semibold text-2xl text-[#5D3F00]">{{ $item['name'] }}</h3>
                            <div class="flex items-center gap-2 mt-2">
                                <button wire:click="decreaseQuantity('{{ $id }}')" class="decrease bg-green-700 text-white px-2 rounded hover:bg-green-800 cursor-pointer">-</button>
                                <span class="font-umum quantity text-xl text-black font-semibold">{{ $item['quantity'] }}</span>
                                <button wire:click="increaseQuantity('{{ $id }}')" class="increase bg-green-700 text-white px-2 rounded hover:bg-green-800 cursor-pointer">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="font-umum text-xl font-semibold text-[#5D3F00]">Rp. {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                        <div wire:click="removeItem('{{ $id }}')" class="remove-btn font-umum flex items-center justify-end text-lg text-gray-600 mt-2 cursor-pointer group hover:text-red-600">
                            <span class="material-icons text-gray-600 group-hover:text-red-600">delete</span>
                            <span class="ml-1 group-hover:text-red-600">REMOVE</span>
                        </div>
                    </div>
                </div>
            @empty
                <p>Your cart is empty.</p>
            @endforelse
        </div>

        <!-- Order Summary -->
        <div class="w-full md:w-1/3 bg-white shadow-lg rounded-lg p-6">
            <h2 class="font-umum text-2xl font-bold mb-2 text-[#5D3F00]">CONFIRM YOUR ORDER</h2>
            <p class="font-umum text-md mb-6">{{ count($cart) }} menu in cart</p>

            <div class="space-y-2 mb-6 font-umum">
                <div class="flex justify-between">
                    <span>Price</span>
                    <span>Rp. {{ number_format($this->total, 0, ',', '.') }}</span>
                </div>
                {{-- <div class="flex justify-between">
                    <span>Discount</span>
                    <span class="text-green-600">-Rp. 20.000</span>
                </div> --}}
                <div class="border-t pt-4 flex justify-between font-bold text-lg">
                    <span>TOTAL</span>
                    <span>Rp. {{ number_format($this->total, 0, ',', '.') }}</span>
                </div>
            </div>

            <div class="flex items-start mb-6 font-umum">
                <input type="checkbox" id="terms" 
                @if($termsAccepted) checked @endif 
                wire:click="toggleTerms" class="mr-2 mt-1 cursor-pointer">

                <label for="terms" class="text-lg">
                    I have read and understood the statement. Now I'm ready to continue to payment
                </label>
                {{-- DEBUG: --}}
                {{-- <span class="ml-4 font-mono text-sm">
                  termsAccepted = {{ $termsAccepted ? 'true' : 'false' }}
                </span> --}}
            </div>
            

            <button wire:click="proceedToCheckout" 
                @class([
                    'font-umum w-full py-3 font-bold rounded-md uppercase transition-all duration-300',
                    'bg-[#688B58] hover:bg-green-800 cursor-pointer' => $termsAccepted,
                    'bg-[#688B58]/30 cursor-not-allowed' => !$termsAccepted,
                ]) 
                @disabled(!$termsAccepted)
            >
                Proceed to Checkout
            </button>

        </div>
    </div>
</main>
