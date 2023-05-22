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
        'id_wisata',
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
                'pelanggan.nama',
                'pelanggan.email',
                'pelanggan.telepon',
                'pelanggan.alamat',
                'paket_wisata.nama_paket',
                'paket_wisata.harga_paket',
                'wisata.nama_wisata',
                'wisata.harga_wisata',
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
                // 'pelanggan.id_user',
                'pelanggan.nama',
                'pelanggan.email',
                'pelanggan.telepon',
                'pelanggan.alamat',
                'paket_wisata.nama_paket',
                'paket_wisata.harga_paket',
                'wisata.nama_wisata',
                'wisata.harga_wisata',
                'status.status',
                'transaksi.id as id_transaksi'
            )->where('transaksi.id', $id)->first();
    }

    // public function detailData2($id)
    // {
    //     return DB::table('transaksi')
    //         ->join('pelanggan', 'transaksi.id_mahasiswa', '=', 'pelanggan.id')
    //         ->join('jenis_layanan',  'transaksi.id_layanan', '=', 'jenis_layanan.id')
    //         ->join('statuses', 'transaksi.id_status', '=', 'statuses.id')
    //         ->join('histories', 'histories.id_permohonan', '=', 'transaksi.id')
    //         ->join('tenaga_kesehatans', 'tenaga_kesehatans.id', '=', 'histories.id_tenaga_kesehatan')
    //         ->select('transaksi.*', 
    //         'pelanggan.id_user',
    //         'pelanggan.nama',
    //         'pelanggan.nrp',
    //         'pelanggan.prodi',
    //         'pelanggan.angkatan',
    //         'pelanggan.kelas',
    //         'jenis_layanan.id', 
    //         'jenis_layanan.layanan', 
    //         'statuses.status',
    //         'histories.id_tenaga_kesehatan',
    //         'tenaga_kesehatans.link_meeting',
    //         // 'prodi.prodi',
    //         'transaksi.id_mahasiswa as id_mahasiswa',
    //         'transaksi.id as id_permohonan'
    //         )
    //         ->where('transaksi.id', $id)->first();
    // }

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

    // public function rekamMedisKesehatan()
    // {
    //     return DB::table('transaksi')
    //     ->join('pelanggan','pelanggan.id', '=', 'transaksi.id_mahasiswa')
    //     ->select('nama', 'nrp', 'id_mahasiswa', 'prodi')->where('id_layanan', [1])
    //     ->whereIn('id_status', [7,9])
    //     ->distinct('id_mahasiswa');
    //     // ->join('pelanggan','pelanggan.id', '=', 'transaksi.id_mahasiswa');
    // }

    // public function detailRekamMedisKesehatan($id)
    // {
    //     return DB::table('transaksi')
    //         ->join('pelanggan', 'transaksi.id_mahasiswa', '=', 'pelanggan.id')
    //         ->join('jenis_layanan',  'transaksi.id_layanan', '=', 'jenis_layanan.id')
    //         ->join('statuses', 'transaksi.id_status', '=', 'statuses.id')
    //         ->join('histories', 'histories.id_permohonan', '=', 'transaksi.id')
    //         ->join('tenaga_kesehatans', 'tenaga_kesehatans.id', '=', 'histories.id_tenaga_kesehatan')
    //         // ->join('prodi', 'transaksi.prodi', '=', 'prodi.prodi')
    //         ->select(
    //             'transaksi.*',
    //             'pelanggan.*',
    //             'pelanggan.id_user',
    //             'pelanggan.nama',
    //             'pelanggan.nrp',
    //             'pelanggan.prodi',
    //             'pelanggan.angkatan',
    //             'pelanggan.kelas',
    //             'jenis_layanan.id',
    //             'jenis_layanan.layanan', 
    //             'statuses.status',
    //             'histories.*',
    //             'histories.penanganan',
    //             'tenaga_kesehatans.nama_tenaga_kesehatan',
    //             'tenaga_kesehatans.jabatan_tenaga_kesehatan',
    //             'transaksi.id_mahasiswa as id_mahasiswa',
    //             'transaksi.id as id_permohonan'
    //         )
    //     ->where('transaksi.id_mahasiswa', $id)
    //     ->whereIn('histories.id_status', [7,9])
    //     ->whereNotIn('transaksi.id_layanan', [2])
    //     ->orderBy('transaksi.updated_at', 'desc');
    // }

    // public function rekamMedisKonseling()
    // {
    //     return DB::table('transaksi')
    //     ->join('pelanggan','pelanggan.id', '=', 'transaksi.id_mahasiswa')
    //     ->select('nama', 'nrp', 'id_mahasiswa', 'prodi')->where('id_layanan', [2])
    //     ->whereIn('id_status', [7,9])
    //     ->distinct('id_mahasiswa');
    //     // ->join('pelanggan','pelanggan.id', '=', 'transaksi.id_mahasiswa');
    // }

    // public function detailRekamMedisKonseling($id)
    // {
    //     return DB::table('transaksi')
    //         ->join('pelanggan', 'transaksi.id_mahasiswa', '=', 'pelanggan.id')
    //         ->join('jenis_layanan',  'transaksi.id_layanan', '=', 'jenis_layanan.id')
    //         ->join('statuses', 'transaksi.id_status', '=', 'statuses.id')
    //         ->join('histories', 'histories.id_permohonan', '=', 'transaksi.id')
    //         ->join('tenaga_kesehatans', 'tenaga_kesehatans.id', '=', 'histories.id_tenaga_kesehatan')
    //         // ->join('prodi', 'transaksi.prodi', '=', 'prodi.prodi')
    //         ->select(
    //             'transaksi.*',
    //             'pelanggan.*',
    //             'pelanggan.id_user',
    //             'pelanggan.nama',
    //             'pelanggan.nrp',
    //             'pelanggan.prodi',
    //             'pelanggan.angkatan',
    //             'pelanggan.kelas',
    //             'jenis_layanan.id',
    //             'jenis_layanan.layanan', 
    //             'statuses.status',
    //             'histories.*',
    //             'histories.penanganan',
    //             'tenaga_kesehatans.nama_tenaga_kesehatan',
    //             'tenaga_kesehatans.jabatan_tenaga_kesehatan',
    //             //'histories.id_tenaga_kesehatan = tenaga_kesehatans.id',
    //             //'prodi.prodi',
    //             'transaksi.id_mahasiswa as id_mahasiswa',
    //             'transaksi.id as id_permohonan'
    //         )
    //     ->where('transaksi.id_mahasiswa', $id)
    //     ->whereIn('histories.id_status', [7,9])
    //     // ->distinct('transaksi.id_mahasiswa')
    //     ->whereNotIn('transaksi.id_layanan', [1])
    //     ->orderBy('transaksi.updated_at', 'desc');
    // }

    // public function countPermohonan()
    // {
    //     return PermohonanLayanan::whereNotIn('id_status', [1])->count();
    // }

    // public function countPermohonanByStatus($status_id)
    // {
    //     return PermohonanLayanan::where('id_status', [$status_id])->count();
    // }

    // public function countPermohonanMahasiswa($status_id)
    // {
    //     return $this->allData()->get()
    //         ->where('id_mahasiswa', Mahasiswa::where('id_user', Auth::user()->id)->first()->id)
    //         ->where('id_status', $status_id)
    //         ->count();
    // }

    // public function countPermohonanDokter($status_id)
    // {
    //     return $this->allData()->get()
    //         ->wherenotIn('id_layanan', [2])
    //         ->where('id_status', $status_id)
    //         ->count();
    // }

    // public function countPermohonanPsikolog($status_id)
    // {
    //     return $this->allData()->get()
    //         ->wherenotIn('id_layanan', [1])
    //         ->where('id_status', $status_id)
    //         ->count();
    // }

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
