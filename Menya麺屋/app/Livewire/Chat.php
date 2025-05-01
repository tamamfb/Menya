<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use App\Models\Menu;
use App\Models\ChatHistory;
class Chat extends Component
{
    public $message = '';
    public $messages = [];
    
    public function sendMessage()
    {
        if (!$this->message) return;
    
        $apiKey = env('GEMINI_API_KEY');

        ChatHistory::create([
            'user_id' => auth()->id(),
            'role' => 'user',
            'content' => $this->message,
        ]);

        $this->messages[] = [
            'content' => $this->message,
            'isUser' => true,
            'role' => 'User',
        ];

        if (!session()->has('conversation')) {
    
            $text = "Act as the helper of my restaurant, the restaurant is named Menya, assigned to assist the user in their journey in ordering food and exploring the website's menu. 
            Our restaurant is a japanese themed restaurant. 
            You are called *Mamam*.
            Our website consists of a home page, menu page, chatbot page, and a checkout page (shown by an image of a cart). All the pages are accessible from the navigator bar at the top right of the page.
            You are tasked with helping the customers with the menu, customizing their orders, and answering any questions they may have about the restaurant or the menu.
            You are solely responsible for what the customer orders, so be mindful of what they might be allergic to or what they might not like.
            If the item is out of stock or unavailable, please inform the user and suggest alternatives.
            If the user asks for a specific item, provide them with the details and options available.
            All the items are priced in Indonesian Rupiah (Rp. ).
            We have 3 available menu types which are Ramen, Sushi, and Beverages.
            You are not allowed to answer questions that are unrelated to the menu or the restaurant, be a representative and apologize accordingly.
            These are the information for our menu:";
    
            $menus = Menu::with('menuType')->get();
            foreach ($menus as $menu) {
                $text .= "\n\nMenu Name: {$menu->name}\n";
                $text .= "Menu Type: {$menu->menuType->name}\n";
                $text .= "Description: {$menu->description}\n";
                $text .= "Price: Rp " . number_format($menu->price, 0, ',', '.') . "\n";
                $text .= "Stock: {$menu->stock}";
            }
    
            session([
                'conversation' => [
                    [
                        'role' => 'user',
                        'parts' => [[ 'text' => $text ]]
                    ]
                ]
            ]);
        }
    
        $conversation = session('conversation');
        $conversation[] = [
            'role' => 'user',
            'parts' => [[ 'text' => $this->message ]]
        ];
    
        try {
            $response = Http::post(
                "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$apiKey}",
                [ 'contents' => $conversation ]
            );
    
            if ($response->successful()) {
                $botReply = $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? 'No response';

                $this->messages[] = ['content' => $botReply, 'isUser' => false, 'role' => 'Mamam'];
    
                $conversation[] = [
                    'role' => 'model',
                    'parts' => [[ 'text' => $botReply ]]
                ];
                session(['conversation' => $conversation]);

                ChatHistory::create([
                    'user_id' => auth()->id(),
                    'role' => 'Mamam',
                    'content' => $botReply,
                ]);
            } else {
                $this->messages[] = ['content' => 'Sorry, I encountered an error. Please try again.', 'isUser' => false, 'role' => 'Mamam'];
            }
        } catch (\Exception $e) {
            logger()->error('Gemini error: ' . $e->getMessage());
            $this->messages[] = ['content' => 'Sorry, I encountered an error. Please try again.', 'isUser' => false, 'role' => 'Mamam'];
        }
    
        $this->reset('message');
        $this->dispatch('messageAdded');
    }
    

    public function render()
    {
        return view('livewire.chat');
    }

    public function mount()
    {
        $this->messages = ChatHistory::where('user_id', auth()->id())
            ->orderBy('created_at')
            ->get()
            ->map(function ($msg) {
                return [
                    'role' => $msg->role,
                    'isUser' => $msg->role === 'user',
                    'content' => $msg->content,
                ];
            })->toArray();
    }
}
