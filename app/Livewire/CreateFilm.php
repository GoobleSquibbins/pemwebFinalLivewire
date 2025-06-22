<?php

namespace App\Livewire;

use App\Models\Genre;
use App\Models\Film;
use Livewire\Component;

class CreateFilm extends Component
{
    public $judul, $sutradara, $tahun, $genre_id;
    public $genres;

    public function mount()
    {
        $this->genres = Genre::all();
    }

    public function store()
    {
        $this->validate([
            'judul' => 'required|string',
            'sutradara' => 'required|string',
            'tahun' => 'required|numeric',
            'genre_id' => 'required',
        ]);

        Film::create([
            'judul' => $this->judul,
            'sutradara' => $this->sutradara,
            'tahun' => $this->tahun,
            'genre_id' => $this->genre_id,
        ]);

        session()->flash('success', 'Film berhasil disimpan!');
        return redirect()->route('main');
    }

    public function render()
    {
        return view('livewire.create-film');
    }
}
