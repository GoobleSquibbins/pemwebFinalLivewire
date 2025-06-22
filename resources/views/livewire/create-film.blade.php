<div class="main-content d-flex justify-content-center align-items-center min-vh-100">
  <div style="width: 100%; max-width: 600px;">
    <a href="{{ route('film') }}" class="text-decoration-none text-dark fs-2 fw-bold d-block mb-4 text-center">
      Add Film
    </a>

    @if (session()->has('success'))
      <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="store" class="card p-4 shadow-sm bg-white">
      <div class="mb-3">
        <label for="judul" class="form-label">Nama Film</label>
        <input type="text" id="judul" wire:model="judul" class="form-control" required>
        @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <div class="mb-3">
        <label for="sutradara" class="form-label">Sutradara Film</label>
        <input type="text" id="sutradara" wire:model="sutradara" class="form-control" required>
        @error('sutradara') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <div class="mb-3">
        <label for="tahun" class="form-label">Tahun Rilis</label>
        <input type="number" id="tahun" wire:model="tahun" class="form-control" required>
        @error('tahun') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <div class="mb-4">
        <label for="genre_id" class="form-label">Genre Film</label>
        <select wire:model="genre_id" id="genre_id" class="form-select" required>
          <option value="">-- Pilih Genre --</option>
          @foreach ($genres as $genre)
            <option value="{{ $genre->genre_id }}">{{ $genre->nama_genre }}</option>
          @endforeach
        </select>
        @error('genre_id') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <button type="submit" class="btn btn-primary w-100">Simpan Film</button>
    </form>
  </div>
</div>
