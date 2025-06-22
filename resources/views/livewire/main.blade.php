<div class="d-flex">
    
    <div class="sidebar bg-dark text-white p-3" style="width: 220px; height: 100vh;">
    <h4 class="text-center">Menu</h4>
    <a href="#" wire:click="setView('tiket')" class="d-block text-white py-2 text-decoration-none">Tiket</a>
    <a href="#" wire:click="setView('film')" class="d-block text-white py-2 text-decoration-none">Film</a>
    <a href="#" wire:click="setView('jadwal')" class="d-block text-white py-2 text-decoration-none">Jadwal</a>
    <a href="{{ route('logout') }}" class="d-block text-white py-2 text-decoration-none">Logout</a>
    </div>

  <div class="main-content p-4" style="flex-grow: 1;">
    @switch($currentView)
        @case('tiket')
            <livewire:tiket-index />
            @break

        @case('film')
            <livewire:film-index />
            @break

        @case('jadwal')
            <livewire:jadwal-index />
            @break
    @endswitch
  </div>
</div>
