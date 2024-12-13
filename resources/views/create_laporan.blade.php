@extends('layout.page', ['title' => 'Tambah Laporan'])

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Tambah Laporan</h1>

            <!-- Form Tambah Laporan -->
            <form action="/laporan" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="tanggal_pelaporan" class="form-label">Tanggal Pelaporan</label>
                    <input type="date" id="tanggal_pelaporan" name="tanggal_pelaporan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="nama_pelapor" class="form-label">Nama Pelapor</label>
                    <input type="text" id="nama_pelapor" name="nama_pelapor" class="form-control" placeholder="Masukkan Nama Pelapor" required>
                </div>

                <div class="mb-3">
                    <label for="no_kamar" class="form-label">No Kamar</label>
                    <input type="text" id="no_kamar" name="no_kamar" class="form-control" placeholder="Masukkan No Kamar" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-select">
                        <option value="Kos" selected>Kos</option>
                        <option value="Kontrakan">kontrakan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Laporan</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4" placeholder="Masukkan Laporan" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">SIMPAN</button>
                <a href="/laporan" class="btn btn-secondary">BATAL</a>
            </form>
        </div>
    </div>
@endsection
