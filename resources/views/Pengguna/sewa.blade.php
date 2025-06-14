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
                <input type="date" name="tanggal_sewa" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Harga per Hari</label>
                <input type="text" class="form-control" value="{{ $kendaraan['harga'] }}" readonly>
            </div>
            <button class="btn btn-primary">Pesan Sewa</button>
        </form>
    @endif
</div>
@endsection