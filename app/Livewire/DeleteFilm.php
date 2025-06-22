<?php

namespace App\Livewire;

use App\Models\Film;
use Livewire\Component;

class DeleteFilm extends Component
{
    public $filmId;

    public function mount($id)
    {
        $this->filmId = $id;
    }

    public function delete()
    {
        $film = Film::find($this->filmId);

        if ($film) {
            $film->delete();
        } 

        return redirect()->route('main');
    }

    public function render()
    {
        return view('livewire.delete-film');
    }
}
