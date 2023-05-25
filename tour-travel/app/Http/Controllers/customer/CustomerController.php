<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriWisata;
use App\Models\Wisata;
use App\Models\PaketWisata;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->kategori_wisata = new KategoriWisata();
        $this->wisata = new Wisata();
        $this->paket_wisata = new PaketWisata();
    }
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $wisata = $this->wisata
                ->allData()
                ->where('nama_wisata', 'LIKE', '%' . $request->search . '%')
                ->paginate(3);
        } else {
            $wisata = $this->wisata
                ->allData()
                ->orderBy('nama_wisata', 'asc')
                ->paginate(3);
        }

        $data = [
            'wisata' => $wisata,
        ];
        //dd($data);
        return view('customer.pages.landing', compact('data'));
    }
    public function package(Request $request)
    {
        if ($request->has('search')) {
            $paket_wisata = $this->paket_wisata
                ->allData()
                ->where('nama_paket', 'LIKE', '%' . $request->search . '%')
                ->paginate(3);
        } else {
            $paket_wisata = $this->paket_wisata
                ->allData()
                ->orderBy('nama_paket', 'asc')
                ->paginate(3);
        }
        $data = [
            'paket_wisata' => $paket_wisata,
        ];
        //dd($paket_wisata);
        return view('customer.pages.package', compact('data'));
    }
    public function destination(Request $request)
    {
        if ($request->has('search')) {
            $wisata = $this->wisata
                ->allData()
                ->where('nama_wisata', 'LIKE', '%' . $request->search . '%')
                ->paginate(9);
        } else {
            $wisata = $this->wisata
                ->allData()
                ->orderBy('nama_wisata', 'asc')
                ->paginate(9);
        }

        $data = [
            'wisata' => $wisata,
        ];
        return view('customer.pages.destination', compact('data'));
    }

    public function destinationDetail()
    {
        return view('customer.pages.destination-detail');
    }

    public function packageDetail($id)
    {
        if (!$this->paket_wisata->detailData($id)) {
            abort(404);
        }

        $paket_wisata = $this->paket_wisata->detailData($id);
        $getdatatest = Wisata::whereIn('id', array($paket_wisata->id_wisata_1, $paket_wisata->id_wisata_2, $paket_wisata->id_wisata_3))->get();
        $data = [
            'paket_wisata' => $this->paket_wisata->detailData($id),
            'foto' => $getdatatest,
        ];

        return view('customer.pages.package-detail', $data);
    }

    public function checkout()
    {
        return view('customer.pages.checkout');
    }

    public function register()
    {
        return view('customer.pages.auth-register');
    }

    public function login()
    {
        return view('customer.pages.auth-login');
    }
}