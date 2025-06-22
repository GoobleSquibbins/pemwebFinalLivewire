<?php

namespace App\Livewire;

use App\Models\Film;
use App\Models\Studio;
use App\Models\Jadwal;
use App\Models\Tiket;
use Livewire\Component;

class EditJadwal extends Component
{
    public $jadwal_id;
    public $film_id, $studio_id, $tanggal, $jam, $harga;
    public $films, $studios;

    public function mount($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $this->jadwal_id = $jadwal->jadwal_id;
        $this->film_id = $jadwal->film_id;
        $this->studio_id = $jadwal->studio_id;
        $this->tanggal = $jadwal->tanggal;
        $this->jam = $jadwal->jam;
        $this->harga = $jadwal->harga;

        $this->films = Film::all();
        $this->studios = Studio::all();
    }

    public function update()
    {
        $this->validate([
            'film_id' => 'required|exists:films,film_id',
            'tanggal' => 'required|date',
            'jam' => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($this->jadwal_id);
        $jadwal->update([
            'film_id' => $this->film_id,
            'tanggal' => $this->tanggal,
            'jam' => $this->jam,
        ]);
        
        return redirect()->route('main');
    }

    public function render()
    {
        return view('livewire.edit-jadwal');
    }
}
