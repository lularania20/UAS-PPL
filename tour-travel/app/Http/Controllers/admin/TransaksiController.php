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

        $transaksi = Transaksi::with(['status', 'wisata', 'paket_wisata', 'pelanggan'])->paginate(20);
        
        $data = [
            'transaksi' => $transaksi,
            'colors' => $colors,
            'opsi_status' => Status::all(),
            'pelanggan' => $this->pelanggan->allData(),
        ];  
        //dd(Transaksi::with(['status', 'wisata', 'paket_wisata', 'pelanggan'])->paginate(3));

        return view('admin.transaksi.index', $data);
    }

    public function add()
    {

        $data = [
            'wisata' => $this->wisata->allData(),
            'paket_wisata' => $this->paket_wisata->allData(),
            'pelanggan' => $this->pelanggan->allData(),
            //'prodi' => DB::table('prodi')->get(),
            //'status' => Status::all()->whereNotIn('id', [1,2,4,5,6,7,8,9,10]),
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
            Alert::success('Sukses!', 'Draft Berhasil Ditambahkan!');
        }

        return redirect('/admin/transaksi');
    }

    public function detail($id)
    {

        if ((!$this->transaksi->detailData($id)) || ($this->transaksi->detailData($id)->id_status == 1)) {
            abort(404);
        }

        $transaksi = $this->transaksi->detailData($id);
        // $profile = Pelanggan::where('id', $transaksi->id_pelanggan)->first();

        $data = [
            'transaksi' => $this->transaksi->detailData($id),
            // 'profile' => $profile,
        ];

        return view('admin/transaksi/detail', $data);
    }

    public function edit($id)
    {
        $transaksi = $this->transaksi->detailData($id);
        if ((!$transaksi)) {
            abort(404);
        }

        $transaksi = Transaksi::find($id);
        $opsi_layanan = DB::table('jenis_layanan')
            ->whereNotIn('id', [$transaksi->id_layanan])
            ->get();

        $opsi_penanganan = DB::table('jenis_penanganan')
            ->whereNotIn('jenis_penanganan', [$transaksi->jenis_penanganan])
            ->get();

        $data = [
            'transaksi' => $transaksi,
            'layanan' => DB::table('jenis_layanan')->where('id', $transaksi->id_layanan)->first(),
            'penanganan' => DB::table('jenis_penanganan')->where('id', $transaksi->jenis_penanganan)->first(),
            'opsi_layanan' => $opsi_layanan->all(),
            'opsi_penanganan' => $opsi_penanganan->all(),
        ];

        return view('/Pelanggan.transaksi-layanan.edit', $data);
    }

    public function update($id, Request $request)
    {

        $request->validate(
            [
                'id_layanan' => 'required',
                'judul_keluhan' => 'required',
                'berkas' => 'required|file|max:2048|mimes:jpeg,jpg,png,pdf',                            // ! TODO : PDF
                'deskripsi_keluhan' => 'max:1000',
            ],
            [
                'id_layanan.required' => 'Wajib terisi',
                'judul_keluhan.required' => 'Wajib terisi',
                'berkas.required' => 'Mohon unggah berkas transaksi.',
                'berkas.max' => 'Ukuran maksimal 2 Mb.',
                'berkas.mimes' => 'Unggah file dalam format JPEG, JPG, PNG, dan PDF.',
                'deskripsi_keluhan.max' => 'Anda telah mencapai kata-kata maksimum.',
            ]
        );

        $file = Transaksi::where('id', $id)->first()->berkas;

        if ($request->hasFile('berkas')) {
            if ($file != null) {
                $oldfilepath = storage_path('app/public' . '/' . $file);
                unlink($oldfilepath);
            }
            $berkas = $request->berkas->store('files', 'public');
        } else {
            $berkas = $file;
        }

        $data = [
            'id_Pelanggan' => Pelanggan::where('id_user', Auth::user()->id)->first()->id,
            // 'id_layanan' => Request()->id_layanan,
            'id_status' => 1,
            'jenis_penanganan' => Request()->jenis_penanganan,
            'judul_keluhan' => Request()->judul_keluhan,
            'deskripsi_keluhan' => Request()->deskripsi_keluhan,
            'berkas' => $berkas,
        ];

        $transaksi = Transaksi::where('id', $id)->update($data);

        if ($transaksi) {
            Alert::success('Sukses!', 'Data Berhasil Diubah!');
        }

        return redirect('/Pelanggan/transaksi-layanan');
    }

    public function destroy($id)
    {
        if ((!Transaksi::where('id', $id)->first()) || (Transaksi::where('id', $id)->first()->id_status != 1)) {
            abort(404);
        }

        $history = DB::table('histories')
            ->where('id_transaksi', $id)
            ->delete();

        $filename = Transaksi::where('id', $id)->first()->berkas;

        if ($filename) {
            $file = storage_path('app/public' . '/' . $filename);
            unlink($file);
        }

        $transaksi = $this->transaksi->deleteData($id);

        if ($transaksi) {
            Alert::success('Sukses!', 'Data Berhasil Dihapus!');
        }
        return redirect('Pelanggan/transaksi-layanan');
    }

    public function apply($id)
    {
        $data = [
            'id_status' => 2,
            'created_at' => Carbon::now(),
        ];

        $transaksi = Transaksi::where('id', $id);
        if ($transaksi->first()->id_status == 1) {
            $update = $transaksi->update($data);
        } else {
            abort(404);
        }

        if ($update) {
            Alert::success('Sukses!', 'transaksi Layanan Berhasil Diajukan!');
        }

        return redirect()->back();
    }

    public function viewFile($id)
    {
        $transaksi = $this->transaksi->detailData($id);
        return response()->file(storage_path('app/public' . '/' . $transaksi->berkas));
    }

    public function generateFile($id)
    {
        $transaksi = $this->transaksi->detailData($id);
        return response()->download(storage_path('app/public' . '/' . $transaksi->berkas));
    }
} 