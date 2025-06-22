<?php

namespace App\Livewire;

use App\Models\Film;
use App\Models\genre;
use Livewire\Component;

class EditFilm extends Component
{
    public $film_id, $judul, $sutradara, $tahun, $genre_id;
    public $genres;

    public function mount($id)
    {
        $film = Film::findOrFail($id);
        $this->film_id = $film->film_id;
        $this->judul = $film->judul;
        $this->sutradara = $film->sutradara;
        $this->tahun = $film->tahun;
        $this->genre_id = $film->genre_id;

        $this->genres = Genre::all();
    }

    public function update()
    {
        $this->validate([
            'judul' => 'required|string',
            'sutradara' => 'required|string',
            'tahun' => 'required|numeric',
            'genre_id' => 'required',
        ]);

        $film = Film::findOrFail($this->film_id);
        $film->update([
            'judul' => $this->judul,
            'sutradara' => $this->sutradara,
            'tahun' => $this->tahun,
            'genre_id' => $this->genre_id,
        ]);

        session()->flash('success', 'Film berhasil diperbarui!');
        return redirect()->route('main');
    }

    public function render()
    {
        return view('livewire.edit-film');
    }
}
