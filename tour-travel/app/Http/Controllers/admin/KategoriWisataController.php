<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\KategoriWisata;

class KategoriWisataController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->kategori_wisata = new KategoriWisata();
    }

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $kategori_wisata = $this->kategori_wisata
                ->allData()
                ->where('kategori_wisata', 'LIKE', '%' . $request->search . '%')
                ->paginate(10);
        } else {
            $kategori_wisata = $this->kategori_wisata
                ->allData()
                ->paginate(10);
        }

        $data = [
            'kategori_wisata' => $kategori_wisata,
        ];

        return view('admin.kategori-wisata.index', $data);
    }

    public function add()
    {
        return view('admin.kategori-wisata.add');
    }

    public function store()
    {
        Request()->validate(
            [
                'kategori_wisata' => 'required'
            ],
            [
                'kategori_wisata.required' => 'wajib diisi!'
            ]
        );

        $data = [
            'kategori_wisata' => Request()->kategori_wisata
        ];
        if ($this->kategori_wisata->addData($data)) {
            Alert::success('Sukses!', 'Data Berhasil Ditambahkan!');
        }
        return redirect('/admin/kategori-wisata');
    }

    public function show($id)
    {
        if (!$this->kategori_wisata->detailData($id)) {
            abort(404);
        }

        $data = [
            'kategori_wisata' => $this->kategori_wisata->detailData($id),
        ];

        return view('admin.kategori-wisata.detail', $data);
    }

    public function edit($id)
    {
        $kategori_wisata = KategoriWisata::findOrFail($id);

        $data = [
            'kategori_wisata' => $kategori_wisata,
        ];
        return view('admin.kategori-wisata.edit', $data);
    }

    public function update($id)
    {
        Request()->validate(
            [
                'kategori_wisata' => 'required'
            ],
            [
                'kategori_wisata.required' => 'wajib diisi!'
            ]
        );

        $data = [
            'kategori_wisata' => Request()->kategori_wisata
        ];
        $kategori_wisata = $this->kategori_wisata->updateData($id, $data);
        if ($kategori_wisata) {
            Alert::success('Sukses!', 'Data Berhasil Diupdate!');
        }
        return redirect('/admin/kategori-wisata');
    }

    public function destroy($id)
    {
        if ($this->kategori_wisata->deleteData($id)) {
            Alert::success('Sukses!', 'Data Berhasil Dihapus!');
        }
        return redirect('/admin/kategori-wisata');
    }
}
