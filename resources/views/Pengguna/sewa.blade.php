@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2>Form Sewa Kendaraan</h2>
    @if(!session('user'))
        <div class="alert alert-warning">
            Anda harus <a href="{{ route('pengguna.login') }}">login</a> untuk memesan kendaraan.
        </div>
    @else
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    <div>{{ $err }}</div>
                @endforeach
            </div>
        @endif
        <form method="POST" action="{{ route('pengguna.sewa', $kendaraan['id']) }}">
            @csrf
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama_user" class="form-control" value="{{ session('user.data.name') ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label>Tanggal Sewa</label>
                <input type="date" name="tanggal_sewa" id="tanggal_sewa" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Harga per Hari</label>
                <input type="text" id="harga_per_hari" class="form-control" value="{{ $kendaraan['harga'] }}" readonly>
                <input type="hidden" name="harga" value="{{ $kendaraan['harga'] }}">
            </div>
            <div class="mb-3">
                <label>Total Harga</label>
                <input type="text" id="total_harga" name="total_harga" class="form-control" readonly>
            </div>
            <button class="btn btn-primary">Pesan Sewa</button>
        </form>
        <script>
            function hitungTotalHarga() {
                const harga = parseInt(document.getElementById('harga_per_hari').value) || 0;
                const tglSewa = document.getElementById('tanggal_sewa').value;
                const tglKembali = document.getElementById('tanggal_kembali').value;
                if (tglSewa && tglKembali) {
                    const start = new Date(tglSewa);
                    const end = new Date(tglKembali);
                    let days = (end - start) / (1000 * 60 * 60 * 24);
                    days = days > 0 ? days : 0;
                    document.getElementById('total_harga').value = days > 0 ? (days * harga) : 0;
                } else {
                    document.getElementById('total_harga').value = '';
                }
            }
            document.getElementById('tanggal_sewa').addEventListener('change', hitungTotalHarga);
            document.getElementById('tanggal_kembali').addEventListener('change', hitungTotalHarga);
        </script>
    @endif
</div>
@endsection