<div class="main-content d-flex justify-content-center align-items-center min-vh-100">
  <div style="width: 100%; max-width: 600px;">
    <a href="{{ route('main') }}" class="text-decoration-none text-dark fs-2 fw-bold d-block mb-4 text-center">
      Edit Jadwal
    </a>

    @if (session()->has('success'))
      <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="update" class="card p-4 shadow-sm bg-white">
      <div class="mb-3">
        <label for="film_id" class="form-label">Pilih Film</label>
        <select id="film_id" wire:model="film_id" class="form-select" required>
          <option value="">-- Pilih Film --</option>
          @foreach ($films as $film)
            <option value="{{ $film->film_id }}">{{ $film->judul }}</option>
          @endforeach
        </select>
        @error('film_id') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal Tayang</label>
        <input type="date" id="tanggal" wire:model="tanggal" class="form-control" required>
        @error('tanggal') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <div class="mb-3">
        <label for="jam" class="form-label">Jam Tayang</label>
        <input type="time" id="jam" wire:model="jam" class="form-control" required>
        @error('jam') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <button type="submit" class="btn btn-primary w-100">Update Jadwal</button>
    </form>
  </div>
</div>
