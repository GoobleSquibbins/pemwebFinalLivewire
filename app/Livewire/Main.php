<?php

namespace App\Livewire;

use Livewire\Component;

class Main extends Component
{
    public string $currentView = 'tiket';

    public function setView($view)
    {
        $this->currentView = $view;
    }

    public function render()
    {
        return view('livewire.main');
    }
}
