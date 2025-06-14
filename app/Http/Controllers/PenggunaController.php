<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PenggunaController extends Controller
{
    // Halaman utama: daftar kendaraan
    public function index()
    {
    $response = Http::get('http://127.0.0.1:8000/api/kendaraan');
    $kendaraans = $response->successful() ? $response->json() : [];
    return view('Pengguna.index', compact('kendaraans'));
    }

    // Detail kendaraan
    public function show($id)
    {
        $kendaraan = Http::get("http://127.0.0.1:8000/api/kendaraan/$id")->json();
        return view('pengguna.show', compact('kendaraan'));
    }

    // Pencarian/filter kendaraan
    public function search(Request $request)
    {
        $query = $request->input('q');
        $kendaraans = Http::get('http://127.0.0.1:8000/api/kendaraan', ['q' => $query])->json();
        return view('pengguna.index', compact('kendaraans'));
    }

    public function loginForm() {
        return view('pengguna.login');
    }
    
    public function registerForm() {
        return view('pengguna.register');
    }
    
    public function login(Request $request) {
        $response = Http::post('http://127.0.0.1:8000/api/auth/login', $request->only('email', 'password'));
        if ($response->successful()) {
            session(['user' => $response->json()]);
            return redirect()->route('pengguna.index');
        }
        return back()->withErrors(['email' => 'Login gagal!']);
    }
    
    public function register(Request $request) {
        $response = Http::post('http://127.0.0.1:8000/api/auth/register', $request->all());
        if ($response->successful()) {
            // return redirect()->route('pengguna.login'); // ke halaman login
            session(['user' => $response->json()]);
            return redirect()->route('pengguna.index');
        }
        return back()->withErrors(['email' => 'Register gagal!']);
    }
    
    public function logout() {
        session()->forget('user');
        return redirect()->route('pengguna.index');
    }

    public function sewaForm($id) {
        $kendaraan = Http::get("http://127.0.0.1:8000/api/kendaraan/$id")->json();
        return view('Pengguna.sewa', compact('kendaraan'));
    }
    
    public function sewa(Request $request, $id) {
        $request->validate([
            'nama_user' => 'required|string',
            'tanggal_sewa' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_sewa',
            'total_harga' => 'required|numeric|min:1',
        ]);
        $kendaraan = Http::get("http://127.0.0.1:8000/api/kendaraan/$id")->json();
        $data = $request->all();
        $data['kendaraan_id'] = $id;
        $data['user_id'] = session('user.data.id') ?? null;
        $data['merk_kendaraan'] = $kendaraan['merk_kendaraan'] ?? '';
        $data['harga'] = $kendaraan['harga'] ?? 0;
        $response = Http::post('http://127.0.0.1:8000/api/riwayat', $data);
        if ($response->successful()) {
            return redirect()->route('pengguna.riwayat')->with('success', 'Pemesanan berhasil!');
        }
        return back()->withErrors(['msg' => 'Gagal memesan kendaraan']);
    }


    public function riwayat()
{
    if (!session('user')) {
        return redirect()->route('pengguna.login');
    }
    $userId = session('user.data.id');
    $response = Http::get('http://127.0.0.1:8000/api/riwayat');
    $riwayats = $response->successful() ? collect($response->json())->where('user_id', $userId) : [];
    return view('pengguna.riwayat', compact('riwayats'));
}
}