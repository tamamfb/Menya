<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Menu;

class MenuPage extends Component
{
    public $ramenItems = [];
    public $sushiItems = [];
    public $beverageItems = [];

    public $showPopup = false;
    public $selectedItem = [];
    public $quantity = 0;
    public $showCounter = false;
    public $closing = false;
    public $showOverlay = false;

    protected $folderMap = [
        1 => 'ramen',
        2 => 'sushi',
        3 => 'beverages',
    ];

    protected $listeners = ['closing-animation-done' => 'hidePopup'];

    public function mount()
    {
        $this->ramenItems = Menu::where('menu_type_id', 1)->get();
        $this->sushiItems = Menu::where('menu_type_id', 2)->get();
        $this->beverageItems = Menu::where('menu_type_id', 3)->get();
    }

    public function openPopup($id)
    {
        $item = Menu::findOrFail($id);
        $folder = $this->folderMap[$item->menu_type_id] ?? 'unknown';

        $this->selectedItem = [
            'id' => $item->id,
            'name' => $item->name,
            'description' => $item->description,
            'price' => $item->price, // <-- add this
            'menu_type_id' => $item->menu_type_id, // <-- add this
            'image' => 'images/' . $folder . '/' . str_replace(' ', '_', strtolower($item->name)) . '.png', // <-- just the path, no asset() yet
        ];

        $cart = session()->get('cart', []);

        if (isset($cart[$item->id])) {
            $this->quantity = $cart[$item->id]['quantity'];
            $this->showCounter = true;
        } else {
            $this->quantity = 0;
            $this->showCounter = false;
        }

        $this->showPopup = true;
        $this->showOverlay = true;
        $this->closing = false;
    }


    public function closePopup()
    {
        $this->closing = true;
    }

    public function hidePopup()
    {
        $this->showPopup = false;
        $this->closing = false;
        $this->showOverlay = false;
    }

    public function updatedClosing($value)
    {
        if ($value) {
            $this->dispatch('closing-animation-done');
        }
    }

    public function incrementQuantity()
    {
        $this->quantity++;
    }

    public function decrementQuantity()
    {
        if ($this->quantity > 0) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        $this->quantity = 1;
        $this->showCounter = true;
    }

    public function saveItemToCart()
    {
        $cart = session()->get('cart', []);

        if ($this->quantity > 0) {
            $cart[$this->selectedItem['id']] = [
                'id' => $this->selectedItem['id'],
                'name' => $this->selectedItem['name'],
                'quantity' => $this->quantity,
                'price' => $this->selectedItem['price'],
                'image' => $this->selectedItem['image'],
            ];
        } else {
            unset($cart[$this->selectedItem['id']]);
        }

        session()->put('cart', $cart);

        $this->closePopup();
    }

    public function render()
    {
        return view('livewire.menu-page');
    }
}
