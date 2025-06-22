<?php

namespace App\Livewire;

use App\Models\Film;
use App\Models\Studio;
use App\Models\Jadwal;
use App\Models\Tiket;
use Livewire\Component;

class CreateJadwal extends Component
{
    public $film_id, $studio_id, $tanggal, $jam, $harga;
    public $films = [], $studios = [];

    public function mount()
    {
        $this->films = Film::all();
        $this->studios = Studio::all();
    }

    public function store()
    {
        $this->validate([
            'film_id' => 'required|exists:films,film_id',
            'studio_id' => 'required|exists:studios,studio_id',
            'tanggal' => 'required|date',
            'jam' => 'required',
        ]);

        $exists = \App\Models\Jadwal::where('studio_id', $this->studio_id)
            ->where('tanggal', $this->tanggal)
            ->where('jam', $this->jam)
            ->exists();

        if ($exists) {
            $this->addError('jam', 'Studio sudah terpakai di waktu tersebut.');
            return;
        }


        $jadwal = Jadwal::create([
            'film_id' => $this->film_id,
            'studio_id' => $this->studio_id,
            'tanggal' => $this->tanggal,
            'jam' => $this->jam,
        ]);

        $studio = Studio::find($this->studio_id);

        for ($i = 1; $i <= $studio->kapasitas; $i++) {
            Tiket::create([
                'jadwal_id' => $jadwal->jadwal_id,
                'harga' => $this->harga,
                'status' => 'tersedia',
            ]);
        }

        session()->flash('success', 'Jadwal dan tiket berhasil ditambahkan!');
        return redirect()->route('main');
    }


    public function render()
    {
        return view('livewire.create-jadwal');
    }
}
