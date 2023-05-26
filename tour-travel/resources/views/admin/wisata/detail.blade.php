@extends('layouts.app')

@section('title', 'Administrator | Detail Wisata')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/wisata">Wisata</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Detail Wisata</b></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <table class="table">
                        <tr>
                            <th width="150px" style="border: none">ID</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $wisata->id }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Nama Wisata</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $wisata->nama_wisata }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Kategori Wisata</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $wisata->kategori_wisata }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Deskripsi Wisata</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $wisata->deskripsi_wisata }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Harga Wisata</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $wisata->harga_wisata }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Alamat Wisata</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $wisata->alamat_wisata }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Gambar Wisata</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none"><img src="{{ url('gambar_wisata/'.$wisata->gambar_wisata) }}" width="100px"></th>
                        </tr>
                    </table>
                </div>
                <table class="table">
                    <tr>
                        <th style="border: none">
                            <a href="/admin/wisata" class="btn btn-dark">Kembali</a>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
