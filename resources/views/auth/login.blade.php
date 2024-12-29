@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="row w-100">
        <div class="col-md-6 offset-md-3"> <!-- Form berada di tengah dan lebih lebar -->
            <div class="card shadow-lg border-0" style="border-radius: 15px; overflow: hidden;">
                <!-- Header -->
                <div class="card-header bg-success text-white text-center py-4">
                    <h2 class="fw-bold">Login</h2>
                    <p class="mb-0">Masukkan email dan password untuk melanjutkan</p>
                </div>

                <!-- Body -->
                <div class="card-body bg-white px-5 py-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Input -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-envelope"></i></span>
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" placeholder="Masukkan email" required autofocus>
                            </div>
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-lock"></i></span>
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Masukkan password" required>
                            </div>
                            @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Lupa Password -->
                        <div class="text-end mb-3">
                            <a href="{{ route('password.request') }}" class="text-decoration-none text-success">Lupa password?</a>
                        </div>

                        <!-- Tombol Login -->
                        <button type="submit" class="btn btn-success btn-lg w-100 mb-3">Login</button>

                        <!-- Link Register -->
                        <div class="text-center">
                            <p class="mb-0">Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none text-success fw-bold">Daftar</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@endsection

<style>
    body {
        background: linear-gradient(120deg, #e8f5e9, #a5d6a7); /* Background gradasi */
        font-family: 'Poppins', sans-serif;
    }

    .card-header {
        background-color: #28a745;
    }

    .form-control-lg {
        border-radius: 10px;
        height: 50px;
        font-size: 16px;
        padding: 10px 15px;
        transition: all 0.3s;
    }

    .form-control-lg:focus {
        border-color: #28a745;
        box-shadow: 0 0 10px rgba(40, 167, 69, 0.3);
    }

    .btn-lg {
        border-radius: 10px;
        font-size: 18px;
        font-weight: bold;
        height: 50px;
        background-color: #28a745;
        color: white;
        transition: all 0.3s;
    }

    .btn-lg:hover {
        background-color: #218838;
        transform: scale(1.03);
    }

    .input-group-text {
        background-color: #f8f9fa;
        border: none;
        padding: 10px;
    }
</style>
