<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\PaketWisata;
use App\Models\Wisata;
use App\Models\Pelanggan;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->transaksi = new Transaksi();
        $this->paket_wisata = new PaketWisata();
        $this->wisata = new Wisata();
        $this->pelanggan = new Pelanggan();
    }

    public function index(Request $request)
    {
        $colors = [
            'danger', 'success'
        ];

        if ($request->has('search')) {
            $transaksi = Transaksi::with(['status', 'wisata', 'paket_wisata', 'pelanggan'])
            ->whereRelation('pelanggan', 'nama', 'LIKE', '%' . $request->search . '%')
            ->paginate(20);
        } else {
            $transaksi = Transaksi::with(['status', 'wisata', 'paket_wisata', 'pelanggan'])->paginate(20);
        }

        $data = [
            'transaksi' => $transaksi,
            'colors' => $colors,
            'opsi_status' => Status::all(),
            'pelanggan' => $this->pelanggan->allData(),
        ];  

        return view('admin.transaksi.index', $data);
    }

    public function add()
    {

        $data = [
            'paket_wisata' => PaketWisata::all(), 
            'wisata' => Wisata::all(),
            'pelanggan' => $this->pelanggan->allData(),
        ];

        return view('/admin/transaksi/add', $data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'id_pelanggan' => 'required',
            ],
            [
                'id_pelanggan.required' => 'Wajib terisi',
            ]
        );

        $transaksi = Transaksi::create([
            'id_pelanggan' => Request()->id_pelanggan,
            'id_wisata' => Request()->id_wisata,
            'id_paket' => Request()->id_paket,
            'id_status' => Request()->id_status,
        ]);

        if ($transaksi) {
            Alert::success('Sukses!', 'Transaksi Berhasil Ditambahkan!');
        }

        return redirect('/admin/transaksi');
    }

    public function detail($id)
    {
        $transaksi = Transaksi::with(['status', 'wisata', 'paket_wisata', 'pelanggan'])->find($id);

        if (!$transaksi) {
            // Jika transaksi dengan ID yang diberikan tidak ditemukan, redirect atau tampilkan pesan error sesuai kebutuhan
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan');
        }

        $data = [
            'transaksi' => $transaksi,
        ];

        return view('admin.transaksi.detail', $data);
    }

    public function updateStatus(Request $request)
    {
        $transaksi = Transaksi::findOrFail($request->id_transaksi);

        if ($transaksi->id_status != ((int)$request->id_status)) {
            $transaksi->id_status = $request->id_status;
        
            if ($request->has('keterangan_pembayaran')) {
                $request->validate([
                    'keterangan_pembayaran' => 'required',
                ], [
                    'keterangan_pembayaran.required' => 'Mohon isi keterangan pembayaran.',
                ]);
        
                $transaksi->keterangan_pembayaran = $request->keterangan_pembayaran;
            } else {
                $transaksi->keterangan_pembayaran = null;
            }
        
            if ($request->has('tanggal_keberangkatan')) {
                $request->validate([
                    'tanggal_keberangkatan' => 'required|date',
                ], [
                    'tanggal_keberangkatan.required' => 'Mohon isi tanggal keberangkatan.',
                    'tanggal_keberangkatan.date' => 'Format tanggal keberangkatan tidak valid.',
                ]);
        
                $transaksi->tanggal_keberangkatan = $request->tanggal_keberangkatan;
            } else {
                $transaksi->tanggal_keberangkatan = null;
            }
        

            if ($transaksi->save()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Status Transaksi Lunas!',
                ]);
            }    
        }
    }
} 