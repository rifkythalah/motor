@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Daftar Kendaraan</h1>
    {{-- Form Search & Filter (hanya 1x, di atas) --}}
    <form method="GET" action="{{ route('pengguna.index') }}" class="mb-4 d-flex align-items-center gap-2">
        <input type="text" name="q" class="form-control" placeholder="Search Merk..." value="{{ request('q') }}">
        <select name="sort" class="form-select w-auto">
            <option value="">Urutkan</option>
            <option value="termurah" {{ request('sort') == 'termurah' ? 'selected' : '' }}>Termurah</option>
            <option value="termahal" {{ request('sort') == 'termahal' ? 'selected' : '' }}>Termahal</option>
        </select>
        <button type="submit" class="btn btn-warning">Filter</button>
    </form>

    <div class="row">
        @if(empty($kendaraans) || count($kendaraans) == 0)
            <div class="alert alert-warning">Tidak ada data kendaraan tersedia.</div>
        @else
            @foreach($kendaraans as $kendaraan)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="http://127.0.0.1:8000/storage/{{ $kendaraan['image'] }}" class="card-img-top" alt="{{ $kendaraan['merk_kendaraan'] }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $kendaraan['merk_kendaraan'] }}</h5>
                            <p class="card-text">Rp {{ number_format($kendaraan['harga'], 0, ',', '.') }}/hari</p>
                            <div class="mt-auto">
                                <a href="{{ route('pengguna.show', $kendaraan['id']) }}" class="btn btn-primary">Detail</a>
                                @if(session('user'))
                                    <a href="{{ route('pengguna.sewaForm', $kendaraan['id']) }}" class="btn btn-success ms-2">Sewa</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection