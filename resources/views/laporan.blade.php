@extends('layout.page', ['title' => 'Laporan '])

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Laporan</h1>

            <!-- Form Pencarian -->
            <form action="" method="GET">
                <div class="row g-3 mb-2">
                    <div class="col">
                        <input type="text" name="q" class="form-control" placeholder="Cari Nama Pelapor atau No Kamar"
                            value="{{ request('q') }}">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">CARI</button>
                    </div>
                </div>
            </form>

            <!-- Tombol Tambah Data -->
            <div class="col-md-6 mb-3">
                <a href="/laporan/create" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>

            <!-- Tabel Laporan -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pelaporan</th>
                        <th>Nama Pelapor</th>
                        <th>No Kamar</th>
                        <th>Status</th>
                        <th>Laporan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporans as $laporan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $laporan->tanggal_pelaporan }}</td>
                            <td>{{ $laporan->User->name }}</td>
                            <td>{{ $laporan->no_kamar }}</td>
                            <td>{{ $laporan->status }}</td>
                            <td>{{ $laporan->deskripsi }}</td>
                            <td>
                                
                                <form action="/laporan/{{ $laporan->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            {!! $laporans->links() !!}
        </div>
    </div>
@endsection
