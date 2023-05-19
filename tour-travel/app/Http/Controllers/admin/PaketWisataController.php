<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
// use App\Models\KategoriPaket;
use App\Models\Wisata;
use App\Models\PaketWisata;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PaketWisataController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
        // $this->kategori_paket = new KategoriPaket();
        $this->wisata = new Wisata();
        $this->paket_wisata = new PaketWisata();
    }

    public function index(Request $request)
    {


        if ($request->has('search')) {
            $paket_wisata = $this->paket_wisata
                ->allData()
                ->where('nama_paket', 'LIKE', '%' . $request->search . '%')
                ->paginate(20);
        } else {
            $paket_wisata = $this->paket_wisata
                ->allData()
                ->paginate(20);
        }

        $data = [
            'paket_wisata' =>$paket_wisata,
        ];

        return view('/admin/paket-wisata/index', $data);
    }

    public function add()
    {
        $wisata = Wisata::select('id', 'nama_wisata')->get();
    
        return view('/admin/paket-wisata/add', compact('wisata'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                // 'id_kategori_paket' => 'required',
                'nama_paket' => 'required',
                'id_wisata_1' => 'required',
                'id_wisata_2' => 'required',
                'id_wisata_3' => 'required',
                'id_wisata_4' => 'required',
                'deskripsi_paket' => 'required',
                'harga_paket' => 'required',
                'foto_paket' => 'required',
            ],
            [
                // 'id_kategori_paket' => 'Wajib terisi',
                'nama_paket' => 'Wajib terisi',
                'id_wisata_1' => 'Wajib terisi',
                'id_wisata_2' => 'Wajib terisi',
                'id_wisata_3' => 'Wajib terisi',
                'id_wisata_4' => 'Wajib terisi',
                'deskripsi_paket' => 'Wajib terisi',
                'harga_paket' => 'Wajib terisi',
                'foto_paket.required' => 'Mohon unggah gambar paket wisata.',
            ]
        );

        $file = Request()->foto_paket;
        $fileName = Request()->nama_paket . '.' . $file->extension();
        $file -> move(public_path('foto_paket'), $fileName);

        $paket_wisata = PaketWisata::create([
            'nama_paket' => Request()->nama_paket,
            'id_wisata_1' => Request()->id_wisata_1,
            'id_wisata_2' => Request()->id_wisata_2,
            'id_wisata_3' => Request()->id_wisata_3,
            'id_wisata_4' => Request()->id_wisata_4,
            'deskripsi_paket' => Request()->deskripsi_paket,
            'harga_paket' => Request()->harga_paket,
            'foto_paket' => $fileName,
        ]);

        if ($paket_wisata) {
            Alert::success('Sukses!', 'Paket Wisata Berhasil Ditambahkan!');
        }

        return redirect('/admin/paket-wisata');
    }

    public function detail($id)
    {
        if (!$this->paket_wisata->detailData($id)) {
            abort(404);
        }

        $paket_wisata = $this->paket_wisata->detailData($id);

        $data = [
            'paket_wisata' => $this->paket_wisata->detailData($id),
        ];

        return view('admin/paket-wisata/detail', $data);
    }

    public function edit($id)
    {
        $paket_wisata = $this->paket_wisata->detailData($id);
        if ((!$paket_wisata)) {
            abort(404);
        }

        $paket_wisata = PaketWisata::find($id);
        // $gambar_wisata = Storage::url('public/' . $this->wisata->detailData($id)->gambar_wisata);

        $data = [
            'paket_wisata' => $paket_wisata,
            // 'kategori_paket' => $this->kategori_paket->allData(),
            // 'kategoripaket' => DB::table('kategori_paket')->where('id', $paket_wisata->id_kategori_paket)->first(),
            'opsi_paket'  => $this->wisata->allData(),
            'wisata1' => DB::table('nama_wisata')->where('id', $paket_wisata->id_wisata_1)->first(),
            'wisata2' => DB::table('nama_wisata')->where('id', $paket_wisata->id_wisata_2)->first(),
            'wisata3' => DB::table('nama_wisata')->where('id', $paket_wisata->id_wisata_3)->first(),
            'wisata4' => DB::table('nama_wisata')->where('id', $paket_wisata->id_wisata_4)->first(),
            // 'gambar_wisata' => $gambar_wisata,
        ];

        return view('admin/paket-wisata/edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate(
            [
                'nama_paket' => 'required',
                'id_wisata_1' => 'required',
                'id_wisata_2' => 'required',
                'id_wisata_3' => 'required',
                'id_wisata_4' => 'required',
                'deskripsi_paket' => 'required',
                'harga_paket' => 'required',
                'foto_paket' => 'required',
            ],
            [
                'nama_wisata' => 'Wajib terisi',
                'id_kategori_wisata' => 'Wajib terisi',
                'editor1' => 'Wajib terisi',
                'harga_wisata' => 'Wajib terisi',
                'alamat_wisata' => 'Wajib terisi',
                'gambar_wisata.required' => 'Mohon unggah gambar wisata.',
                'gambar_wisata.max' => 'Ukuran maksimal 2 Mb.',
                'gambar_wisata.mimes' => 'Unggah file dalam format JPEG, JPG, dan PNG.',
            ]
        );

        $file = Wisata::where('id', $id)->first()->gambar_wisata;

        if ($request->hasFile('gambar_wisata')) {
            if ($file != null) {
                $oldfilepath = storage_path('app/public' . '/' . $file);
                unlink($oldfilepath);
            }
            $gambar_wisata = $request->gambar_wisata->store('files', 'public');
        } else {
            $gambar_wisata = $file;
        }

        $data = [
            'nama_wisata' => Request()->nama_wisata,
            'id_kategori_wisata' => Request()->id_kategori_wisata,
            'deskripsi_wisata' => Request()->editor1,
            'harga_wisata' => Request()->harga_wisata,
            'alamat_wisata' => Request()->alamat_wisata,
            'gambar_wisata' => $gambar_wisata,
        ];

        $wisata = Wisata::where('id', $id)->update($data);

        if ($wisata) {
            Alert::success('Sukses!', 'Data wisata Kesehatan Berhasil Diubah!');
        }

        return redirect('/admin/paket-wisata');
    }

    public function destroy($id)
    {
        if ((!Wisata::where('id', $id)->first())) {
            abort(404);
        }

        $filename = Wisata::where('id', $id)->first()->gambar_wisata;

        if ($filename) {
            $file = storage_path('app/public' . '/' . $filename);
            unlink($file);
        }

        $wisata = $this->wisata->deleteData($id);

        if ($wisata) {
            Alert::success('Sukses!', 'Data Berhasil Dihapus!');
        }
        return redirect('admin/paket-wisata');
    }

    // public function apply($id)
    // {
    //     $data = [
    //         'id_status' => 8,
    //         'created_at' => Carbon::now(),
    //     ];

    //     $wisata = wisataKesehatan::where('id', $id);
    //     if ($wisata->first()->id_status == 1) {
    //         $update = $wisata->update($data);
    //     } else {
    //         abort(404);
    //     }

    //     if ($update) {
    //         Alert::success('Sukses!', 'wisata Kesehatan Berhasil Diunggah!');
    //     }

    //     return redirect()->back();
    // }

    // public function viewFile($id)
    // {
    //     $wisata = $this->wisata->detailData($id);
    //     return response()->file(storage_path('app/public' . '/' . $wisata->gambar));
    // }

    // public function generateFile($id)
    // {
    //     $wisata = $this->wisata->detailData($id);
    //     return response()->download(storage_path('app/public' . '/' . $wisata->gambar));
    // }

    // public function wisata()
    // {
    //     $wisata = $this->wisata->allData()->where('id_status', [8])->paginate(12);

    //     $data = [
    //         'wisata' => $wisata,
    //     ];

    //     return view('/pengurus_tekkes/wisata/index', $data);
    // }

    // public function wisataDetail($id)
    // {
    //     if ((!$this->wisata->detailData($id)) || ($this->wisata->detailData($id)->id_status == 1)) {
    //         abort(404);
    //     }

    //     $data = [
    //         'wisata' => $this->wisata->detailData($id),
    //     ];
        
    //     return view('/pengurus_tekkes/wisata/detail', $data);
    //     // return view('/mahasiswa/wisata-kesehatan');
    // }
}