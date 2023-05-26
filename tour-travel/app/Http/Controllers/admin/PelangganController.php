<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->pelanggan = new Pelanggan();
    }

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $pelanggan = $this->pelanggan
                ->allData()
                ->where('nama', 'LIKE', '%' . $request->search . '%')
                ->paginate(10);
        } else {
            $pelanggan = $this->pelanggan
                ->allData()
                ->paginate(10);
        }

        $data = [
            'pelanggan' => $pelanggan,
        ];

        return view('admin.pelanggan.index', $data);
    }

    public function add()
    {
        return view('admin.pelanggan.add');
    }

    public function store()
    {
        Request()->validate(
            [
                'nama' => 'required',
                'email' => 'required',
                'telepon' => 'required',
                'alamat' => 'required',
            ],
            [
                'nama.required' => 'wajib diisi!',
                'email.required' => 'wajib diisi!',
                'telepon.required' => 'wajib diisi!',
                'alamat.required' => 'wajib diisi!',
            ]
        );

        $data = [
            'nama' => Request()->nama,
            'email' => Request()->email,
            'telepon' => Request()->telepon,
            'alamat' => Request()->alamat
        ];
        if ($this->pelanggan->addData($data)) {
            Alert::success('Sukses!', 'Data Berhasil Ditambahkan!');
        }
        return redirect('/admin/pelanggan');
    }

    public function show($id)
    {
        if (!$this->pelanggan->detailData($id)) {
            abort(404);
        }

        $data = [
            'pelanggan' => $this->pelanggan->detailData($id),
        ];

        return view('admin.pelanggan.detail', $data);
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $data = [
            'pelanggan' => $pelanggan,
        ];
        return view('admin.pelanggan.edit', $data);
    }

    public function update($id)
    {
        Request()->validate(
            [
                'nama' => 'required',
                'email' => 'required',
                'telepon' => 'required',
                'alamat' => 'required',
            ],
            [
                'nama.required' => 'wajib diisi!',
                'email.required' => 'wajib diisi!',
                'telepon.required' => 'wajib diisi!',
                'alamat.required' => 'wajib diisi!',
            ]
        );

        $data = [
            'nama' => Request()->nama,
            'email' => Request()->email,
            'telepon' => Request()->telepon,
            'alamat' => Request()->alamat
        ];

        $pelanggan = $this->pelanggan->updateData($id, $data);
        if ($pelanggan) {
            Alert::success('Sukses!', 'Data Berhasil Diupdate!');
        }
        return redirect('/admin/pelanggan');
    }

    public function destroy($id)
    {
        if ($this->pelanggan->deleteData($id)) {
            Alert::success('Sukses!', 'Data Berhasil Dihapus!');
        }
        return redirect('/admin/pelanggan');
    }
}