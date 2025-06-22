<div>
  <h2 class="fs-2 fw-bold mb-4">TIKET FILM</h2>

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
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark text-center">
        <tr>
          <th>Film</th>
          <th>Studio</th>
          <th>Tanggal</th>
          <th>Jam</th>
          <th>Sisa Kursi</th>
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
            <td class="text-center">
              @php
                $tersedia = $jadwal->tiket->where('status', 'tersedia')->count();
              @endphp

              @if ($tersedia <= 0)
                <span class="badge bg-danger">FULL</span>
              @else
                <span class="badge bg-success">{{ $tersedia }} kursi</span>
              @endif
            </td>

            <td class="text-center">
              <a href="{{ route('tiket.book', ['id' => $jadwal->jadwal_id]) }}" class="btn btn-primary btn-sm">Book</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
