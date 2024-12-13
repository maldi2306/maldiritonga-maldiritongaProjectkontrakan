@extends('layout.page', ['title' => 'Daftar Penghuni'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Daftar Penghuni</h1>

            <!-- Form Pencarian -->
            <form action="" method="GET">
                <div class="row g-3 mb-2">
                    <div class="col">
                        <input type="text" name="q" class="form-control" placeholder="Cari Nama atau No Telepon"
                            value="{{ request('q') }}">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">CARI</button>
                    </div>
                </div>
            </form>

            <!-- Tombol Tambah Data -->
            <div class="col-md-6 mb-3">
                <a href="/penghuni/create" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>

            <!-- Tabel Daftar Penghuni -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Usia</th>
                        <th>Status</th>
                        <th>No Kamar</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penghunis as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->usia }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->no_kamar }}</td>
                            <td>{{ $item->no_telepon }}</td>
                            <td>
                                <a href="{{ route('penghuni.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('penghuni.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                </form>
                                                              
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            {!! $penghunis->links() !!}
        </div>
    </div>
@endsection