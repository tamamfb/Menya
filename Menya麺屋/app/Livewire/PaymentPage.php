<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;

class PaymentPage extends Component
{
    public $transaction;
    public $cart = [];

    public function mount()
    {
        $transactionId = session('last_transaction_id');

        if (!$transactionId) {
            abort(403, 'No transaction found');
        }

        $this->cart = session()->get('cart', []);
        $this->transaction = Transaction::findOrFail($transactionId);
    }

    public function finalize()
    {
        if (!$this->transaction || $this->transaction->status === 'success') {
            return;
        }

        foreach ($this->cart as $item) {
            TransactionItem::create([
                'transaction_id' => $this->transaction->id,
                'menu_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);

            $menu = Menu::find($item['id']);
            if ($menu) {
                $menu->decrement('stock', $item['quantity']);
            }
        }

        $this->transaction->update(['status' => 'success']);

        session()->forget('cart');
        session()->forget('last_transaction_id');

        return redirect()->route('success');
    }

    public function render()
    {
        return view('livewire.payment-page');
    }
}
