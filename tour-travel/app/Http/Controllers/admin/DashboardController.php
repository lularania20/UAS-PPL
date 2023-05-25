<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\PaketWisata;
use App\Models\Wisata;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->wisata = new Wisata();
        $this->paket_wisata = new PaketWisata();
        $this->pelanggan = new Pelanggan();
        $this->transaksi = new Transaksi();
    }

    public function index()
    {
        $data = [
            'countWisata' => $this->wisata->countWisata(),
            'countPaketWisata' => $this->paket_wisata->countPaketWisata(),
            'countPelanggan' => $this->pelanggan->countPelanggan(),
            'countTransaksi' => $this->transaksi->countTransaksi(),
        ];
        return view('admin.dashboard', $data);
    }
}
