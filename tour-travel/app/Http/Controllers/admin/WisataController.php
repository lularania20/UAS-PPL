<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriWisata;
use App\Models\Wisata;
use App\Models\PaketWisata;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class WisataController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->kategori_wisata = new KategoriWisata();
        $this->wisata = new Wisata();
    }

    public function index(Request $request)
    {

        if ($request->has('search')) {
            $wisata = $this->wisata
                ->allData()
                ->where('nama_wisata', 'LIKE', '%' . $request->search . '%')
                ->paginate(20);
        } else {
            $wisata = $this->wisata
                ->allData()
                ->paginate(20);
        }

        $data = [
            'wisata' =>$wisata,
        ];

        return view('/admin/wisata/index', $data);
    }

    public function add()
    {
        $data = [
            'kategori_wisata' => $this->kategori_wisata->allData(),
        ];

        return view('/admin/wisata/add', $data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_wisata' => 'required',
                'id_kategori_wisata' => 'required',
                'editor1' => 'required',
                'harga_wisata' => 'required',
                'gambar_wisata' => 'required',
                'alamat_wisata' => 'required',
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

        $file = Request()->gambar_wisata;
        $fileName = Request()->nama_wisata . '.' . $file->extension();
        $file -> move(public_path('gambar_wisata'), $fileName);

        $wisata = Wisata::create([
            'nama_wisata' => Request()->nama_wisata,
            'id_kategori_wisata' => Request()->id_kategori_wisata,
            'deskripsi_wisata' => Request()->editor1,
            'harga_wisata' => Request()->harga_wisata,
            'alamat_wisata' => Request()->alamat_wisata,
            'gambar_wisata' => $fileName,
        ]);

        if ($wisata) {
            Alert::success('Sukses!', 'Wisata Berhasil Ditambahkan!');
        }

        return redirect('/admin/wisata');
    }

    public function detail($id)
    {
        if (!$this->wisata->detailData($id)) {
            abort(404);
        }

        $wisata = $this->wisata->detailData($id);

        $data = [
            'wisata' => $this->wisata->detailData($id),
        ];

        return view('admin/wisata/detail', $data);
    }

    public function edit($id)
    {
        $wisata = $this->wisata->detailData($id);
        if ((!$wisata)) {
            abort(404);
        }

        $wisata = Wisata::find($id);
        // $gambar_wisata = Storage::url('public/' . $this->wisata->detailData($id)->gambar_wisata);

        $data = [
            'wisata' => $wisata,
            'kategori_wisata' => $this->kategori_wisata->allData(),
            'kategori' => DB::table('kategori_wisata')->where('id', $wisata->id_kategori_wisata)->first(),
            // 'gambar_wisata' => $gambar_wisata,
        ];

        return view('admin/wisata/edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate(
            [
                'nama_wisata' => 'required',
                'id_kategori_wisata' => 'required',
                'editor1' => 'required',
                'harga_wisata' => 'required',
                'gambar_wisata' => 'required|file|max:2048|mimes:jpeg,jpg,png',
                'alamat_wisata' => 'required',        
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

        return redirect('/admin/wisata');
    }

    public function destroy($id)
    {
        $wisata = Wisata::find($id);

        if (!$wisata) {
            abort(404);
        }

        // Check if the Wisata is associated with any PaketWisata
        $paket_wisata = PaketWisata::where('id_wisata_1', $wisata->id)
            ->orWhere('id_wisata_2', $wisata->id)
            ->orWhere('id_wisata_3', $wisata->id)
            ->orWhere('id_wisata_4', $wisata->id)
            ->get();

        if ($paket_wisata->count() > 0) {
            // Update the related PaketWisata records to remove the association with this Wisata
            $paket_wisata->each(function ($paket) use ($wisata) {
                if ($paket->id_wisata_1 == $wisata->id) {
                    $paket->id_wisata_1 = null;
                }
                if ($paket->id_wisata_2 == $wisata->id) {
                    $paket->id_wisata_2 = null;
                }
                if ($paket->id_wisata_3 == $wisata->id) {
                    $paket->id_wisata_3 = null;
                }
                if ($paket->id_wisata_4 == $wisata->id) {
                    $paket->id_wisata_4 = null;
                }
                $paket->save();
            });
        }

        // Delete the Wisata
        $wisata->delete();

        return redirect()->route('admin.wisata.index')->with('success', 'Wisata deleted successfully');
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