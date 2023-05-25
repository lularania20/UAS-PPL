<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\KategoriWisata;

class DashboardController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function countData($grafik)
    {

    }

    public function pedoman()
    {

    }
}
