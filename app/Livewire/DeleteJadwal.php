<?php

namespace App\Livewire;

use App\Models\Jadwal;
use Livewire\Component;

class DeleteJadwal extends Component
{
    public $jadwal_id;

    public function mount($id)
    {
        $this->jadwal_id = $id;
    }

    public function delete()
    {
        $jadwal = Jadwal::find($this->jadwal_id);

        if ($jadwal) {
            $jadwal->delete();
        } 

        return redirect()->route('main');
    }

    public function render()
    {
        return view('livewire.delete-jadwal');
    }
}
