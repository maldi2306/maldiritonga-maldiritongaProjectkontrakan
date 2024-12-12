@extends('layout.page', ['title' => 'Tambah Kontrakan'])

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Tambah Data Kontrakan</h1>
            <form action="/daftar" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="no_kamar" class="form-label">Nomor Kamar</label>
                    <input type="number" name="no_kamar" id="no_kamar" class="form-control" value="{{ old('no_kamar') }}" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="terisi" {{ old('status') == 'kontrakan' ? 'selected' : '' }}>Kontrakan</option>
                        <option value="kosong" {{ old('status') == 'kos' ? 'selected' : '' }}>Kos</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <select name="keterangan" id="keterangan" class="form-control" required>
                        <option value="kontrakan" {{ old('keterangan') == 'kosong' ? 'selected' : '' }}>Kosong</option>
                        <option value="kos" {{ old('keterangan') == 'terisi' ? 'selected' : '' }}>Terisi</option>
                    </select>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="foto">Foto (jpg, jpeg, png)</label>
                       <input type="file" class="form-control @error('foto')is-invalid
                   @enderror"
                           id="foto" name="foto">
                       <span class="text-danger">{{ $errors->first('foto') }}</span>
                   </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga') }}" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
