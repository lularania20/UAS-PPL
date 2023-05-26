<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Transaksi extends Model
{
    use HasFactory;
    public $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_pelanggan',
        'id_paket',
        'id_status',
        'keterangan_pembayaran',
        'tanggal_keberangkatan',
        'created_by',
        'updated_by',
    ];

    public function allData()
    {
        return DB::table('transaksi')
            ->join('pelanggan', 'transaksi.id_pelanggan', '=', 'pelanggan.id')
            ->join('paket_wisata', 'transaksi.id_paket', '=', 'paket_wisata.id')
            ->join('wisata', 'transaksi.id_wisata', '=', 'wisata.id')
            ->join('status', 'transaksi.id_status', '=', 'status.id')
            ->select(
                'transaksi.*',
                'pelanggan.id as id_pelanggan',
                'pelanggan.nama',
                'pelanggan.email',
                'pelanggan.telepon',
                'pelanggan.alamat',
                'paket_wisata.id as id_paket_wisata',
                'paket_wisata.nama_paket',
                'paket_wisata.harga_paket',
                'status.status',
                'transaksi.id as id_transaksi'
            );
    }

    public function detailData($id)
    {
        return DB::table('transaksi')
            ->join('pelanggan', 'transaksi.id_pelanggan', '=', 'pelanggan.id')
            ->join('paket_wisata', 'transaksi.id_paket', '=', 'paket_wisata.id')
            ->join('wisata', 'transaksi.id_wisata', '=', 'wisata.id')
            ->join('status', 'transaksi.id_status', '=', 'status.id')
            ->select(
                'transaksi.*',
                'pelanggan.id as id_pelanggan',
                'pelanggan.nama',
                'pelanggan.email',
                'pelanggan.telepon',
                'pelanggan.alamat',
                'paket_wisata.id as id_paket_wisata',
                'paket_wisata.nama_paket',
                'paket_wisata.harga_paket',
                'status.status',
                'transaksi.id as id_transaksi'
            )->where('transaksi.id', $id)->first();
    }

    public function getDataDetail($id)
    {
       return DB::table('transaksi')
       ->join('statuses', 'transaksi.id_status', '=', 'statuses.id')
       ->where('transaksi.id',$id)
       ->first();
    }

    public function addData($data)
    {
        return DB::table('transaksi')->insert($data);
    }

    public function editData($id, $data)
    {
        return DB::table('transaksi')
            ->where('transaksi.id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        return DB::table('transaksi')
            ->where('id', $id)
            ->delete();
    }

    public function countTransaksi()
    {
        $data = DB::table('transaksi')->count();
        return $data;
    }

    public function countTransaksibyStatus($id_status)
    {
        $data = DB::table('transaksi')->where('id_status', $id_status)->count();
        return $data;
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'id_wisata');
    }

    public function paket_wisata()
    {
        return $this->belongsTo(PaketWisata::class, 'id_paket');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

}
