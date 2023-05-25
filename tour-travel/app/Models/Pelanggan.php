<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Pelanggan extends Model
{
    use HasFactory;

    public $table = 'pelanggan';
    protected $primaryKey = 'id';
    protected $fillable = [
        // 'id_user',
        // 'id_role',
        'nama',
        'email',
        // 'password',
        'telepon',
        'alamat',
    ];

    public function getData()
    {
        return DB::table('pelanggan')
            ->select('pelanggan')
            ->get();
    }

    public function detailData($id)
    {
        return $this->getData()
            ->where('id', $id)
            ->first();
    }

    // public function rekamMedis()
    // {
    //     return DB::table('pelanggan')
    //     ->join('permohonan_layanans','pelanggan.id', '=', 'permohonan_layanans.id_mahasiswa')
    //     ->select('nama', 'nrp')->where('id_mahasiswa')
    //     ->distinct();
    //     // ->join('pelanggan','pelanggan.id', '=', 'permohonan_layanans.id_mahasiswa');
    // }

    public function addData($data)
    {
        return DB::table('pelanggan')->insert($data);
    }

    public function allData()
    {
        return DB::table('pelanggan');
    }

    public function updateData($id, $data)
    {
        return DB::table('pelanggan')
            ->where('id', $id)
            ->update($data);
    }

    // public function countMahasiswa()
    // {
    //     $data = DB::table('pelanggan')->count();
    //     return $data;
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user');
    // }

    // public function mahasiswa()
    // {
    //     return $this->belongsTo(PermohonanLayanan::class, 'id_mahasiswa');
    // }
    public function deleteData($id)
    {
        return DB::table('pelanggan')
            ->where('id', $id)
            ->delete();
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pelanggan');
    }
}