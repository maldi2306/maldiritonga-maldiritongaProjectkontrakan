@extends('layout.page', ['title' => 'Daftar Kontrakan'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Daftar Kos dan Kontrakan</h1>

            <!-- Form Pencarian -->
            <form action="" method="GET">
                <div class="row g-3 mb-2">
                    <div class="col">
                        <input type="text" name="q" class="form-control" placeholder="Cari Nomor Kamar atau Deskripsi"
                            value="{{ request('q') }}">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">CARI</button>
                    </div>
                </div>
            </form>

            <!-- Tombol Tambah Data -->
            <div class="col-md-6 mb-3">
                <a href="/daftar/create" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>

            <!-- Tabel Daftar Kontrakan -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Kamar</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Foto</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kontrakans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_kamar }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                @if ($item->foto)
                                    <a href="{{ Storage::url($item->foto) }}" target="blank">
                                        <img src="{{ Storage::url($item->foto) }}" width= "50" alt="">
                                    </a>
                                @endif

                                
                            </td>
                            <td>Rp {{ number_format($item->harga, 2, ',', '.') }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <a href="/kontrakan/{{ $item->id }}/edit" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('kontrakan.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            {!! $kontrakans->links() !!}
        </div>
    </div>
@endsection
