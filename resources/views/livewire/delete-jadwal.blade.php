<div class="main-content d-flex justify-content-center align-items-center min-vh-100">
  <div style="max-width: 500px;" class="text-center bg-white p-5 shadow-sm rounded">
    <h4 class="mb-4">Apakah anda yakin ingin menghapus jadwal ini?</h4>


    <div class="d-flex justify-content-between">
      <a href="{{ route('main') }}" class="btn btn-secondary">Batal</a>
      <button wire:click="delete" class="btn btn-danger">Ya, Hapus</button>
    </div>
  </div>
</div>
