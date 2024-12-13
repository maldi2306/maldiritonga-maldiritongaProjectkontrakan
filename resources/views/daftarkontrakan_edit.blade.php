@extends('layout.page', ['title' => 'Edit Kontrakan'])

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Edit Data Kontrakan</h1>
            <form action="/kontrakan/{{ $kontrakan->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="no_kamar" class="form-label">Nomor Kamar</label>
                    <input type="number" name="no_kamar" id="no_kamar" class="form-control" value="{{ $kontrakan->no_kamar }}" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="terisi" {{ $kontrakan->status == 'terisi' ? 'selected' : '' }}>Terisi</option>
                        <option value="kosong" {{ $kontrakan->status == 'kosong' ? 'selected' : '' }}>Kosong</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <select name="keterangan" id="keterangan" class="form-control" required>
                        <option value="kontrakan" {{ $kontrakan->keterangan == 'kontrakan' ? 'selected' : '' }}>Kontrakan</option>
                        <option value="kos" {{ $kontrakan->keterangan == 'kos' ? 'selected' : '' }}>Kos</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    @if ($kontrakan->foto)
                        <div>
                            <img src="{{ Storage::url($kontrakan->foto) }}" width="100" alt="Foto">
                        </div>
                    @endif
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" value="{{ $kontrakan->harga }}" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ $kontrakan->deskripsi }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="/daftar" class="btn btn-secondary">BATAL</a>
            </form>
        </div>
    </div>
@endsection
