<div class="min-h-screen flex flex-col font-umum bg-[#F0E1C5] overflow-hidden pt-36">

    <!-- Chat Area -->
    <div class="flex-1 flex flex-col overflow-hidden">

        <!-- Scrollable Messages -->
        <div id="chat-messages" class="flex-1 overflow-y-auto px-4 py-6 space-y-4" wire:poll.visible>
            <!-- Messages here -->
            @foreach($messages as $msg)
                @php $isUser = ($msg['role'] ?? '') === "User"; @endphp
                <div class="flex {{ $isUser ? 'justify-end' : '' }} items-start space-x-3">
                    @if(!$isUser)
                        <div class="h-8 w-8 rounded-full bg-[#c5855a] flex items-center justify-center">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                            </svg>
                        </div>
                    @endif

                    <div class="rounded-lg {{ $isUser ? 'bg-[#D08E5A] text-white' : 'bg-white text-gray-800' }} p-3 shadow max-w-[80%]">
                        <p class="text-sm">
                            {!! nl2br(preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', e($msg['content']))) !!}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Chat Input -->
        <div class="border-t border-[#e0d6c5] bg-[#F5EEDC] px-4 py-3">
            <form wire:submit.prevent="sendMessage" class="flex gap-4">
                <input type="text" wire:model.defer="message"
                       class="flex-1 rounded-lg border border-[#D08E5A] bg-white px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#db9e74]"
                       placeholder="Type your message...">
                <button type="submit"
                        class="rounded-lg bg-[#D08E5A] px-4 py-2 text-sm text-white hover:bg-[#c2794f] focus:outline-none focus:ring-2 focus:ring-[#db9e74]">
                    Send
                </button>
            </form>
        </div>

    </div>

</div>