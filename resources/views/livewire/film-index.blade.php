<div>
  <h2 class="fs-2 fw-bold mb-4">FILM</h2>

  <a href="{{ route('film.create') }}" class="btn btn-success mb-3">Add Film</a>

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark text-center">
        <tr>
          <th>Film</th>
          <th>Sutradara</th>
          <th>Tahun</th>
          <th>Genre</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($films as $film)
          <tr>
            <td>{{ $film->judul }}</td>
            <td>{{ $film->sutradara }}</td>
            <td>{{ $film->tahun }}</td>
            <td>{{ $film->genre->nama_genre ?? '-' }}</td>
            <td class="text-center">
              <a href="{{ route('film.edit', ['id' => $film->film_id]) }}" class="btn btn-warning btn-sm">Edit</a>
              <a href="{{ route('film.delete', ['id' => $film->film_id]) }}" class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
