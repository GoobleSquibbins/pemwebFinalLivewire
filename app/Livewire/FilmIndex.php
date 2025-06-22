<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Film;

class FilmIndex extends Component
{
    public $films;

    public function mount()
    {
        $this->films = Film::with('genre')->get();
    }

    public function render()
    {
        return view('livewire.film-index');
    }
}
