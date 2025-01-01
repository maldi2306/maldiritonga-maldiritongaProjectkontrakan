@extends('layout.page', ['title' => 'Daftar Kontrakan'])

@section('content')
    <a class="text-nowrap logo-img" style="display: block; text-align: center; margin-bottom: -20px;">
        <img src="/modern/src/assets/images/logos/logo.png" width="350" alt="Logo" />
    </a>

    <div class="container my-5">
        <div class="row justify-content-center">
            @foreach ($kontrakans as $item)
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card shadow-lg border-0">
                        <div class="card-img-top">
                            @if ($item->foto)
                                <a href="{{ Storage::url($item->foto) }}" target="_blank">
                                    <img src="{{ Storage::url($item->foto) }}" class="img-fluid rounded-top" alt="Foto Kontrakan">
                                </a>
                            @else
                                <img src="/modern/src/assets/images/default-placeholder.png" class="img-fluid rounded-top" alt="Default Image">
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $item->status }}</h5>
                            <p class="text-muted text-center">Harga: <strong>Rp.{{ number_format($item->harga, 0, ',', '.') }}</strong></p>
                            <p class="text-muted text-center">{{ $item->deskripsi }}</p>
                            <p class="text-muted text-center">Status: {{ $item->status }}</p>
                            <a href="{{ route('detail_daftarkontrakan', $item->id) }}" class="btn btn-primary d-block mx-auto mt-3">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('css')
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection
