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
        'nama',
        'email',
        'telepon',
        'alamat',
    ];

    public function detailData($id)
    {
        return DB::table('pelanggan')
            ->where('pelanggan.id', $id)->first();
    }

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

    public function countPelanggan()
    {
        $data = DB::table('pelanggan')->count();
        return $data;
    }

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