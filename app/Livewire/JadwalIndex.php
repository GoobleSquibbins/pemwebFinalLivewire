<?php

namespace App\Livewire;

use App\Models\Genre;
use App\Models\Jadwal;
use Livewire\Component;

class JadwalIndex extends Component
{
    public $filterDate, $genres, $jadwals;

    public function mount()
    {
        $this->genres = Genre::all();
        $this->jadwals = Jadwal::with('film', 'studio')->get();
    }

    public function filterByGenre($genreId)
    {
        $this->jadwals = Jadwal::whereHas('film', fn($q) => $q->where('genre_id', $genreId))
            ->with('film', 'studio')->get();
    }

    public function filterByDate()
    {
        if ($this->filterDate) {
            $this->jadwals = Jadwal::whereDate('tanggal', $this->filterDate)
                ->with('film', 'studio')->get();
        }
    }

    public function render()
    {
        return view('livewire.jadwal-index');
    }

}
