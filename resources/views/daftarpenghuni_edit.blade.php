@extends('layout.page', ['title' => 'Edit Penghuni'])

@section('content')
<div class="card">
    <div class="card-body">
        <h1>Edit Data Penghuni</h1>
        <form action="{{ route('penghuni.update', $penghuni->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $penghuni->nama) }}" required>
                @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="usia" class="form-label">Usia</label>
                <input type="number" name="usia" id="usia" class="form-control" value="{{ old('usia', $penghuni->usia) }}" required>
                @error('usia')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Mahasiswa" {{ old('status', $penghuni->status) == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                    <option value="Bekerja" {{ old('status', $penghuni->status) == 'Bekerja' ? 'selected' : '' }}>Bekerja</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_kamar" class="form-label">Nomor Kamar</label>
                <input type="text" name="no_kamar" id="no_kamar" class="form-control" value="{{ old('no_kamar', $penghuni->no_kamar) }}" required>
                @error('no_kamar')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_telepon" class="form-label">Nomor Telepon</label>
                <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="{{ old('no_telepon', $penghuni->no_telepon) }}" required>
                @error('no_telepon')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('penghuni.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
