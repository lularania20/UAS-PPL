<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaketWisata extends Model
{
    use HasFactory;
    public $table = 'paket_wisata';
    protected $primaryKey = 'id';
    protected $fillable = [
        // 'id_kategori_paket',
        'nama_paket',
        'id_wisata_1',
        'id_wisata_2',
        'id_wisata_3',
        'id_wisata_4',
        'deskripsi_paket',
        'harga_paket',
        'foto_paket',
        'created_by',
        'updated_by',
    ];

    public function allData()
    {
    return DB::table('paket_wisata')
        ->join('wisata as w1', 'paket_wisata.id_wisata_1', '=', 'w1.id')
        ->join('wisata as w2', 'paket_wisata.id_wisata_2', '=', 'w2.id')
        ->join('wisata as w3', 'paket_wisata.id_wisata_3', '=', 'w3.id')
        ->select(
            'paket_wisata.*',
            'w1.nama_wisata as nama_wisata_1',
            'w1.gambar_wisata as gambar_wisata_1',
            'w2.nama_wisata as nama_wisata_2',
            'w2.gambar_wisata as gambar_wisata_2',
            'w3.nama_wisata as nama_wisata_3',
            'w3.gambar_wisata as gambar_wisata_3',
        );
    }

    public function detailData($id)
    {
    return DB::table('paket_wisata')
        ->join('wisata as w1', 'paket_wisata.id_wisata_1', '=', 'w1.id')
        ->join('wisata as w2', 'paket_wisata.id_wisata_2', '=', 'w2.id')
        ->join('wisata as w3', 'paket_wisata.id_wisata_3', '=', 'w3.id')
        ->select(
            'paket_wisata.*',
            'w1.nama_wisata as nama_wisata_1',
            'w1.gambar_wisata as gambar_wisata_1',
            'w2.nama_wisata as nama_wisata_2',
            'w2.gambar_wisata as gambar_wisata_2',
            'w3.nama_wisata as nama_wisata_3',
            'w3.gambar_wisata as gambar_wisata_3',)->where('paket_wisata.id', $id)->first();
    }

    public function addData($data)
    {
        return DB::table('paket_wisata')->insert($data);
    }

    public function editData($id, $data)
    {
        return DB::table('paket_wisata')
            ->where('paket_wisata.id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        return DB::table('paket_wisata')
            ->where('id', $id)
            ->delete();
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

    // public function status()
    // {
    //     return $this->belongsTo(Status::class, 'id_status');
    // }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_transaksi');
    }
}
