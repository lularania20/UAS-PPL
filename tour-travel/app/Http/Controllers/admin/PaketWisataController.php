<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use App\Models\PaketWisata;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PaketWisataController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
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
                'nama_paket' => 'required',
                'id_wisata_1' => 'required',
                'id_wisata_2' => 'required',
                'id_wisata_3' => 'required',
                'deskripsi_paket' => 'required',
                'harga_paket' => 'required',
                'foto_paket' => 'required',
            ],
            [
                'nama_paket' => 'Wajib terisi',
                'id_wisata_1' => 'Wajib terisi',
                'id_wisata_2' => 'Wajib terisi',
                'id_wisata_3' => 'Wajib terisi',
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
            'deskripsi_paket' => Request()->deskripsi_paket,
            'harga_paket' => Request()->harga_paket,
            'foto_paket' => $fileName,
        ]);

        if ($paket_wisata) {
            Alert::success('Sukses!', 'Paket Wisata Berhasil Ditambahkan');
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
        if (!$paket_wisata) {
            abort(404);
        }

        $wisata = Wisata::select('id', 'nama_wisata')->get();

        $data = [
            'paket_wisata' => $paket_wisata,
            'wisata' => $wisata,
        ];

        return view('admin.paket-wisata.edit', $data, );
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama_paket' => 'required',
                'id_wisata_1' => 'required',
                'id_wisata_2' => 'required',
                'id_wisata_3' => 'required',
                'deskripsi_paket' => 'required',
                'harga_paket' => 'required',
                'foto_paket' => 'required',
            ],
            [
                'nama_paket.required' => 'Wajib terisi',
                'id_wisata_1.required' => 'Wajib terisi',
                'id_wisata_2.required' => 'Wajib terisi',
                'id_wisata_3.required' => 'Wajib terisi',
                'deskripsi_paket.required' => 'Wajib terisi',
                'harga_paket.required' => 'Wajib terisi',
                'foto_paket.required' => 'Mohon unggah gambar paket wisata.',
            ]
        );

        $paket_wisata = PaketWisata::findOrFail($id);

        $paket_wisata->nama_paket = $request->nama_paket;
        $paket_wisata->id_wisata_1 = $request->id_wisata_1;
        $paket_wisata->id_wisata_2 = $request->id_wisata_2;
        $paket_wisata->id_wisata_3 = $request->id_wisata_3;
        $paket_wisata->deskripsi_paket = $request->deskripsi_paket;
        $paket_wisata->harga_paket = $request->harga_paket;

        if ($request->hasFile('foto_paket')) {
            $file = $request->file('foto_paket');
            $fileName = $request->nama_paket . '.' . $file->extension();
            $file->move(public_path('foto_paket'), $fileName);
            $paket_wisata->foto_paket = $fileName;
        }

        $paket_wisata->save();

        Alert::success('Sukses!', 'Paket Wisata Berhasil Diperbarui');

        return redirect('/admin/paket-wisata');
    }


    public function destroy($id)
    {
        $paket_wisata = PaketWisata::find($id);

        if (!$paket_wisata) {
            abort(404);
        }

        $paket_wisata->delete();

        return redirect()->route('admin.paket-wisata.index')
            ->with('success', 'Paket Wisata Berhasil Dihapus');
    }

}