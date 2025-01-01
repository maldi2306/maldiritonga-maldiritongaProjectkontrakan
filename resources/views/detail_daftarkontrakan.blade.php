@extends('layout.page', ['title' => 'Detail Kontrakan'])

@section('content')
    <div class="container mt-5">
        <!-- Heading Section -->
        <div class="text-center mb-5">
            <h2 class="font-weight-bold">Detail Kontrakan: {{ $kontrakan->no_kamar }}</h2>
            <p class="text-muted">Lihat informasi lengkap tentang kontrakan ini.</p>
        </div>

        <!-- Main Content Section -->
        <div class="row">
            <!-- Image Section -->
            <div class="col-md-12 mb-4 text-center">
                <div class="card shadow-lg">
                    <!-- Small and Short image size -->
                    <img src="{{ Storage::url($kontrakan->foto) }}" alt="Foto Kontrakan" class="img-fluid rounded-top short-img">
                </div>
            </div>

            <!-- Information Section -->
            <div class="col-md-12">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h5 class="card-title mb-4 text-primary">Informasi Kontrakan</h5>
                        <p><strong>No Kamar:</strong> {{ $kontrakan->no_kamar }}</p>
                        <p><strong>Status:</strong> {{ $kontrakan->status }}</p>
                        <p><strong>Keterangan:</strong> {{ $kontrakan->keterangan }}</p>
                        <p><strong>Harga:</strong> Rp. {{ number_format($kontrakan->harga, 0, ',', '.') }}</p>
                        <p><strong>Deskripsi:</strong> {{ $kontrakan->deskripsi }}</p>
                        
                        <!-- Back Button -->
                        <a href="{{ route('Dasboard.index') }}" class="btn btn-secondary mt-4">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        body {
            background-color: #f4f6f9;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-danger {
            background-color: #dc3545;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        /* Custom class for smaller and shorter image */
        .short-img {
            width: 100%; /* Adjust width to fit the container */
            max-width: 400px; /* Set a smaller max width */
            height: 250px; /* Set fixed height to make it shorter */
            object-fit: cover; /* Ensure the image is cropped to fill the height */
            margin: 0 auto; /* Center the image */
            display: block;
        }
    </style>
@endsection

@section('js')
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
