<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KategoriWisata extends Model
{
    use HasFactory;
    protected $table = 'kategori_wisata';
    protected $primaryKey = 'id';
    protected $fillable = ['kategori_wisata'];

    public function allData()
    {
        return DB::table('kategori_wisata')->get();
    }

    public function allData2()
    {
        return DB::table('kategori_wisata');
    }

    public function detailData($id)
    {
        return $this->allData()
            ->where('id', $id)
            ->first();
    }

    public function addData($data)
    {
        return DB::table('kategori_wisata')->insert($data);
    }

    public function updateData($id, $data)
    {
        return DB::table('kategori_wisata')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        return DB::table('kategori_wisata')
            ->where('id', $id)
            ->delete();
    }

    // public function countkategori_wisata()
    // {
    //     $data = DB::table('kategori_wisata')->count();
    //     return $data;
    // }

    // public function permohonan()
    // {
    //     return $this->hasMany(PermohonanLayanan::class, 'kategori_wisata');
    // }
}
