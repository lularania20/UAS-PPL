<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Wisata extends Model
{
    use HasFactory;
    public $table = 'wisata';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_kategori_wisata',
        'nama_wisata',
        'deskripsi_wisata',
        'harga_wisata',
        'gambar_wisata',
        'alamat_wisata',
        'created_by',
        'updated_by',
    ];

    public function allData()
    {
        return DB::table('wisata')
            ->join('kategori_wisata', 'wisata.id_kategori_wisata', '=', 'kategori_wisata.id')
            ->select(
                'wisata.*',
                'kategori_wisata.kategori_wisata',
            );
    }

    public function detailData($id)
    {
        return DB::table('wisata')
            ->join('kategori_wisata', 'wisata.id_kategori_wisata', '=', 'kategori_wisata.id')
            ->select(
                'wisata.*',
                'kategori_wisata.kategori_wisata',
            )->where('wisata.id', $id)->first();
    }

    public function addData($data)
    {
        return DB::table('wisata')->insert($data);
    }

    public function editData($id, $data)
    {
        return DB::table('wisata')
            ->where('wisata.id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        return DB::table('wisata')
            ->where('id', $id)
            ->delete();
    }

    public function countWisata()
    {
        $data = DB::table('wisata')->count();
        return $data;
    }

    // public function countInformasi()
    // {
    //     return InformasiKesehatan::whereNotIn('id_status', [2,3,4,5,6,7])->count();
    // }

    // public function countInformasiByStatus($status_id)
    // {
    //     return InformasiKesehatan::where('id_status', [$status_id])->count();
    // }

    // public function getAllGrafik()
    // {
    //     return
    //        InformasiKesehatan::whereYear('created_at', Carbon::now()->year)
    //         ->whereNotIn('id_status', [2,3,4,5,6,7])
    //         ->orderBy('created_at', 'asc')
    //         ->get()
    //         ->groupBy(
    //             function ($date) {
    //                 return Carbon::parse($date->created_at)
    //                     ->format('M');
    //             }
    //         );
    // }

    // public function getAxisGrafik()
    // {
    //     return
    //        InformasiKesehatan::whereMonth('created_at', Carbon::now()->month)
    //         ->whereNotIn('id_status', [2,3,4,5,6,7])
    //         ->orderBy('created_at', 'asc')
    //         ->get();
    // }

    // public function getDataGrafik($status_id)
    // {
    //     return
    //        InformasiKesehatan::whereYear('created_at', Carbon::now()->year)
    //         ->where('id_status', $status_id)
    //         ->orderBy('created_at', 'asc')
    //         ->get()
    //         ->groupBy(
    //             function ($date) {
    //                 return Carbon::parse($date->created_at)
    //                     ->format('M');
    //             }
    //         );
    // }

    public function kategori_wisata()
    {
        return $this->belongsTo(KategoriWisata::class, 'id_kategori_wisata');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_transaksi');
    }
}
