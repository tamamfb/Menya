<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class CheckoutPage extends Component
{
    public $cart = [];
    public $termsAccepted = false;

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function increaseQuantity($itemId)
    {
        if (isset($this->cart[$itemId])) {
            $this->cart[$itemId]['quantity']++;
            session()->put('cart', $this->cart);
        }
    }

    public function decreaseQuantity($itemId)
    {
        if (isset($this->cart[$itemId]) && $this->cart[$itemId]['quantity'] > 1) {
            $this->cart[$itemId]['quantity']--;
            session()->put('cart', $this->cart);
        }
    }

    public function removeItem($itemId)
    {
        unset($this->cart[$itemId]);
        session()->put('cart', $this->cart);
    }

    public function getTotalProperty()
    {
        $total = 0;
        foreach ($this->cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function proceedToCheckout()
    {
        if (!$this->termsAccepted) {
            return;
        }

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'total_price' => $this->total,
            'status' => 'pending',
        ]);

        session(['last_transaction_id' => $transaction->id]);
        return redirect()->route('payment');
    }

    public function toggleTerms()
    {
        $this->termsAccepted = ! $this->termsAccepted;
    }

    public function render()
    {
        return view('livewire.checkout-page');
    }
}
