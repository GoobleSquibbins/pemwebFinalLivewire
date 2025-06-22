<div class="main-content d-flex justify-content-center align-items-center min-vh-100">
  <div style="width: 100%; max-width: 600px;">
    <a href="{{ route('tiket') }}" class="text-decoration-none text-dark fs-2 fw-bold d-block mb-4 text-center">
      Booking Tiket
    </a>

    @if (session()->has('success'))
      <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="card p-4 shadow-sm bg-white">
      <h4 class="mb-3 text-center">{{ $jadwal->film->judul ?? '-' }}</h4>
      <h6 class="text-center mb-2">Studio: {{ $jadwal->studio->nama_studio ?? '-' }}</h6>
      <p class="text-center mb-4">{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('Y-m-d') }} - {{ $jadwal->jam }}</p>

      <h5 class="text-success text-center mb-4">Rp {{ number_format($tiket->harga, 0, ',', '.') }}</h5>

      <form wire:submit.prevent="store">
        <div class="mb-3">
          <label for="payment" class="form-label">Pembayaran</label>
          <input type="number" wire:model="payment" id="payment" class="form-control" required>
          @error('payment') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Bayar Sekarang</button>
      </form>
    </div>
  </div>
</div>
