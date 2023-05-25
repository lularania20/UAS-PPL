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

    // public function getAllGrafik()
    // {
    //     return
    //         PermohonanLayanan::whereYear('created_at', Carbon::now()->year)
    //         ->whereNotIn('id_status', [8])
    //         ->orderBy('created_at', 'asc')
    //         ->get()
    //         ->groupBy(
    //             function ($date) {
    //                 return Carbon::parse($date->created_at)
    //                     ->format('M');
    //             }
    //         );
    // }

    // public function getAllGrafikMahasiswa()
    // {
    //     return
    //         PermohonanLayanan::whereYear('created_at', Carbon::now()->year)
    //         ->whereNotIn('id_status', [8])
    //         ->where('id_mahasiswa', Mahasiswa::where('id_user', Auth::user()->id)->first()->id)
    //         ->orderBy('created_at', 'asc')
    //         ->get()
    //         ->groupBy(
    //             function ($date) {
    //                 return Carbon::parse($date->created_at)
    //                     ->format('M');
    //             }
    //         );
    // }

    // public function getAllGrafikDokter()
    // {
    //     return
    //         PermohonanLayanan::whereYear('created_at', Carbon::now()->year)
    //         ->whereNotIn('id_layanan', [2])
    //         ->orderBy('created_at', 'asc')
    //         ->get()
    //         ->groupBy(
    //             function ($date) {
    //                 return Carbon::parse($date->created_at)
    //                     ->format('M');
    //             }
    //         );
    // }

    // public function getAllGrafikPsikolog()
    // {
    //     return
    //         PermohonanLayanan::whereYear('created_at', Carbon::now()->year)
    //         ->whereNotIn('id_layanan', [1])
    //         ->orderBy('created_at', 'asc')
    //         ->get()
    //         ->groupBy(
    //             function ($date) {
    //                 return Carbon::parse($date->created_at)
    //                     ->format('M');
    //             }
    //         );
    // }

    // public function getDataGrafik($layanan_id)
    // {
    //     return
    //         PermohonanLayanan::whereYear('created_at', Carbon::now()->year)
    //         ->whereNotIn('id_status', [8])
    //         ->where('id_layanan', $layanan_id)
    //         ->orderBy('created_at', 'asc')
    //         ->get()
    //         ->groupBy(
    //             function ($date) {
    //                 return Carbon::parse($date->created_at)
    //                     ->format('M');
    //             }
    //         );
    // }

    // public function getDataGrafikDokter($status_id)
    // {
    //     return
    //         PermohonanLayanan::whereYear('created_at', Carbon::now()->year)
    //         ->whereNotIn('id_layanan', [2])
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

    // public function getDataGrafikPsikolog($status_id)
    // {
    //     return
    //         PermohonanLayanan::whereYear('created_at', Carbon::now()->year)
    //         ->whereNotIn('id_layanan', [1])
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

    // public function getDataGrafikMahasiswa($layanan_id)
    // {
    //     return
    //         PermohonanLayanan::whereYear('created_at', Carbon::now()->year)
    //         ->whereNotIn('id_status', [8])
    //         ->where('id_layanan', $layanan_id)
    //         ->where('id_mahasiswa', Mahasiswa::where('id_user', Auth::user()->id)->first()->id)
    //         ->orderBy('created_at', 'asc')
    //         ->get()
    //         ->groupBy(
    //             function ($date) {
    //                 return Carbon::parse($date->created_at)
    //                     ->format('M');
    //             }
    //         );
    // }

    // public function histories()
    // {
    //     return $this->hasMany(History::class, 'id_permohonan');
    // }

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
