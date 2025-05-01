<div class="flex min-h-screen">
    <!-- Left side -->
    <div class="w-1/2 bg-[#db9e74] flex items-center justify-center relative">
        <img src="{{ asset('images/ramen.png') }}" alt="Ramen Bowl" class="w-64">
        <img src="{{ asset('images/kanji.png') }}" alt="Japanese Text" class="absolute bottom-4 right-4 w-28">
    </div>

    <!-- Right side -->
    <div class="w-1/2 bg-[#f5eedc] flex flex-col justify-center px-12 py-8">
        <h2 class="text-4xl font-menu mb-2">Irasshaimase!</h2>
        <p class="font-umum mb-4 text-gray-500 text-xl">Create your account and taste the best Japanese food in the world</p>

        <hr class="border-t mb-4">

        <form wire:submit.prevent="register" novalidate class="font-umum">
            <!-- Name -->
            <div class="mb-4">
                <label for="name">Name *</label>
                <input type="text" id="name" wire:model.debounce.300ms="name"
                    placeholder="Enter your name"
                    class="w-full px-4 py-2 border rounded-lg @error('name') border-red-500 @enderror">
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email">Email *</label>
                <input type="email" id="email" wire:model.debounce.300ms="email"
                    placeholder="Enter your email"
                    class="w-full px-4 py-2 border rounded-lg @error('email') border-red-500 @enderror">
                @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password">Password *</label>
                <input type="password" id="password" wire:model.lazy="password"
                    placeholder="Enter your password"
                    class="w-full px-4 py-2 border rounded-lg @error('password') border-red-500 @enderror">
                @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation">Confirm Password *</label>
                <input type="password" id="password_confirmation" wire:model.lazy="password_confirmation"
                    placeholder="Confirm your password"
                    class="w-full px-4 py-2 border rounded-lg">
            </div>

            <button type="submit" class="cursor-pointer font-bold w-full bg-[#688B58] text-[#f5eedc] py-2 rounded-lg hover:bg-[#90C290]">Create</button>

            <p class="text-sm mt-4 text-center">
                Already have an account?
                <a href="{{ route('login') }}" class="font-bold text-[#5D4000]">Sign in</a>
            </p>
        </form>
    </div>
</div>
