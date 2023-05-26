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
        'nama_paket',
        'id_wisata_1',
        'id_wisata_2',
        'id_wisata_3',
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
                'w1.deskripsi_wisata as deskripsi_wisata_1',
                'w2.nama_wisata as nama_wisata_2',
                'w2.gambar_wisata as gambar_wisata_2',
                'w2.deskripsi_wisata as deskripsi_wisata_2',
                'w3.nama_wisata as nama_wisata_3',
                'w3.gambar_wisata as gambar_wisata_3',
                'w3.deskripsi_wisata as deskripsi_wisata_3',
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
                'w3.gambar_wisata as gambar_wisata_3'
            )
            ->where('paket_wisata.id', $id)->first();
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

    public function countPaketWisata()
    {
        $data = DB::table('paket_wisata')->count();
        return $data;
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_transaksi');
    }
}