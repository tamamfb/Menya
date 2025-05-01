<div>
    <div class="text-center pt-20 mb-20">
        <h1 class="text-6xl font-bold">PICK YOUR METHOD OF PAYMENT</h1>
    </div>

    <div class="flex flex-col items-center justify-center">
        <div id="payment-grid" class="grid grid-cols-2 gap-4 mb-12 justify-items-center mx-auto max-w-fit">
            <div data-method="gopay" class="payment-option relative w-48 aspect-square border-4 border-gray-400 rounded-4xl overflow-hidden hover:shadow-lg cursor-pointer transition-all">
                <img src="images/bayar/gopay.png" alt="Gopay" class="object-cover w-full h-full">
            </div>
            <div data-method="qris" class="payment-option relative w-48 aspect-square border-4 border-gray-400 rounded-4xl overflow-hidden hover:shadow-lg cursor-pointer transition-all">
                <img src="images/bayar/qris.png" alt="QRIS" class="object-cover w-full h-full">
            </div>
            <div data-method="shopee" class="payment-option relative w-48 aspect-square border-4 border-gray-400 rounded-4xl overflow-hidden hover:shadow-lg cursor-pointer transition-all">
                <img src="images/bayar/shopee.png" alt="ShopeePay" class="object-cover w-full h-full">
            </div>
            <div data-method="bitcoin" class="payment-option relative w-48 aspect-square border-4 border-gray-400 rounded-4xl overflow-hidden hover:shadow-lg cursor-pointer transition-all">
                <img src="images/bayar/bitcoin.png" alt="Bitcoin" class="object-cover w-full h-full">
            </div>
        </div>

        <button id="continue-btn" class="bg-green-200 text-green-700 text-2xl font-bold py-2 px-6 rounded-full cursor-not-allowed" wire:click="finalize"> 
            CONTINUE
        </button>
    </div>
    <script>
    const options = document.querySelectorAll('.payment-option');
        const continueBtn = document.getElementById('continue-btn');

        options.forEach(opt => {
            opt.addEventListener('click', () => {
                options.forEach(el => {
                    el.classList.remove('border-green-500', 'ring', 'ring-green-300');
                    el.classList.add('border-gray-400');
                });

                opt.classList.remove('border-gray-400');
                opt.classList.add('border-green-500', 'ring', 'ring-green-300');

                continueBtn.disabled = false;
                continueBtn.classList.remove('cursor-not-allowed', 'bg-green-200', 'text-green-700');
                continueBtn.classList.add('cursor-pointer', 'bg-green-600', 'text-white');
            });
        });
    </script>
</div>
