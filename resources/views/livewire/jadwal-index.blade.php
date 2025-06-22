<div class="main-content">
  <a href="#" wire:click="$emit('setView', 'jadwal')" class="text-decoration-none text-dark fs-2 fw-bold d-block mb-4">
    Jadwal Film
  </a>

  <a href="{{ route('jadwal.create') }}" class="btn btn-success mb-3">Add Jadwal</a>

  <div class="mb-3">
    <strong>Filter Genre:</strong><br>
    @foreach ($genres as $genre)
      <button wire:click="filterByGenre({{ $genre->genre_id }})" class="btn btn-outline-secondary btn-sm mt-1">
        {{ $genre->nama_genre }}
      </button>
    @endforeach
  </div>

  <form wire:submit.prevent="filterByDate" class="mb-4 d-flex gap-2">
    <input type="date" wire:model="filterDate" class="form-control" style="max-width: 200px;">
    <button type="submit" class="btn btn-primary">Sort by Date</button>
  </form>

  <div class="table-responsive">
    <table class="table table-striped table-bordered bg-white shadow-sm">
      <thead class="table-dark">
        <tr>
          <th>Film</th>
          <th>Studio</th>
          <th>Tanggal</th>
          <th>Jam</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($jadwals as $jadwal)
          <tr>
            <td>{{ $jadwal->film->judul ?? '-' }}</td>
            <td>{{ $jadwal->studio->nama_studio ?? '-' }}</td>
            <td>{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('Y-m-d') }}</td>
            <td>{{ $jadwal->jam }}</td>
            <td>
                <a href="{{ route('jadwal.edit', ['id' => $jadwal->jadwal_id]) }}" class="btn btn-warning btn-sm">Edit</a>
                <a href="{{ route('jadwal.delete', ['id' => $jadwal->jadwal_id]) }}" class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
