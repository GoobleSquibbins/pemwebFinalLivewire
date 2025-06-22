<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tiket;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Session;

class BookTiket extends Component
{
    public $payment;
    public $jadwal;
    public $tiket;

    public function mount($id)
    {
        $this->tiket_id = $id;
        $this->tiket = Tiket::where('jadwal_id', $id)->where('status', 'tersedia')->first();
        $this->jadwal = $this->tiket->jadwal;
    }

    public function store()
    {
        if ($this->payment < $this->tiket->harga) {
            $this->addError('payment', 'Pembayaran tidak mencukupi.');
            return;
        }

        $this->tiket->status = 'terjual';
        $this->tiket->save();

        session()->flash('success', 'Tiket berhasil dibeli!');
        return redirect()->route('main');
    }

    public function render()
    {
        return view('livewire.book-tiket');
    }
}
