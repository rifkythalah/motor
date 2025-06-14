@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2>Riwayat Sewa Saya</h2>
    @if($riwayats->isEmpty())
        <div class="alert alert-info">Belum ada riwayat sewa.</div>
    @else
        <div class="row">
            @foreach($riwayats as $riwayat)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $riwayat['merk_kendaraan'] }}</h5>
                             <img src="http://127.0.0.1:8000/storage/{{ $kendaraan['image'] }}" class="card-img-top" alt="{{ $kendaraan['merk_kendaraan'] }}">
                            <p class="card-text">Tanggal Sewa: {{ $riwayat['tanggal_sewa'] }}</p>
                            <p class="card-text">Tanggal Kembali: {{ $riwayat['tanggal_kembali'] }}</p>
                            <p class="card-text">Total Harga: Rp {{ number_format($riwayat['total_harga'], 0, ',', '.') }}</p>
                            <span class="badge bg-success">Aktif</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection