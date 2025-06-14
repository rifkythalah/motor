@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h1>{{ $kendaraan['merk_kendaraan'] }}</h1>
    <img src="http://127.0.0.1:8000/storage/{{ $kendaraan['image'] }}" class="card-img-top" alt="{{ $kendaraan['merk_kendaraan'] }}">
    <p>Warna: {{ $kendaraan['warna'] }}</p>
    <p>Harga: Rp {{ number_format($kendaraan['harga'], 0, ',', '.') }}/hari</p>
    <a href="{{ session('user') ? route('pengguna.sewaForm', $kendaraan['id']) : route('pengguna.login') }}" class="btn btn-secondary">Sewa</a>

</div>
@endsection