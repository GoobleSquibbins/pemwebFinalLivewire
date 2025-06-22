<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tiket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      overflow-x: hidden;
    }
    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 220px;
      background-color: #343a40;
      color: white;
      padding-top: 20px;
    }
    .sidebar a {
      color: white;
      padding: 10px 20px;
      display: block;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #495057;
    }
    .main-content {
      margin-left: 220px;
      padding: 20px;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h4 class="text-center">Menu</h4>
    <a href="/tiket">Tiket</a>
    <a href="/film">Film</a>
    <a href="/jadwal">Jadwal</a>
    <a href="/logout" onclick="return confirm('Yakin mau logout?')">Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <a href="{{ route('tiket') }}" class="text-decoration-none text-dark fs-2 fw-bold d-block mb-4">
      TIKET FILM
    </a>

    <div class="mb-3 d-flex flex-wrap gap-2">
      @foreach($genres as $genre)
        <a href="{{ route('tiket.sortGenreTiket', ['id' => $genre->genre_id]) }}" class="btn btn-outline-primary btn-sm">
          {{ $genre->nama_genre }}
        </a>
      @endforeach
    </div>

    <form action="{{ route('tiket.sortDateTiket') }}" method="get" class="mb-4 d-flex gap-2">
      <input type="date" name="date" class="form-control" style="max-width: 200px;">
      <button type="submit" class="btn btn-success">Sort</button>
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
          @foreach($jadwals as $jadwal)
            <tr>
              <td>{{ $jadwal->film?->judul }}</td>
              <td>{{ $jadwal->studio?->nama_studio }}</td>
              <td>{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('Y-m-d') }}</td>
              <td>{{ $jadwal->jam }}</td>
              <td class="text-center">
                @if($jadwal->tiket->count() <= 0)
                  <span class="badge bg-danger">FULL</span>
                @else
                  <span class="badge bg-success">{{ $jadwal->tiket->count() }} kursi</span>
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

</body>
</html>
