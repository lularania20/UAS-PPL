@extends('layouts.app')

@section('title', 'Administrator | Detail Paket Wisata')
 
@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/paket-wisata">Paket Wisata</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Detail Paket Wisata</b></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <table class="table">
                        <tr>
                            <th width="150px" style="border: none">ID</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $paket_wisata->id }}</th>
                        </tr>
                        <tr>
                            <th width="300px" style="border: none">Nama Paket Wisata</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $paket_wisata->nama_paket }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">List Wisata 1</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $paket_wisata->nama_wisata_1 }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Foto Wisata 1</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none"><img src="{{ url('gambar_wisata/'.$paket_wisata->gambar_wisata_1) }}" width="100px"></th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">List Wisata 2</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $paket_wisata->nama_wisata_2 }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Foto Wisata 2</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none"><img src="{{ url('gambar_wisata/'.$paket_wisata->gambar_wisata_2) }}" width="100px"></th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">List Wisata 3</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $paket_wisata->nama_wisata_3 }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Foto Wisata 3</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none"><img src="{{ url('gambar_wisata/'.$paket_wisata->gambar_wisata_3) }}" width="100px"></th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">List Wisata 4</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $paket_wisata->nama_wisata_4 }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Foto Wisata 4</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none"><img src="{{ url('gambar_wisata/'.$paket_wisata->gambar_wisata_4) }}" width="100px"></th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Harga Paket Wisata</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $paket_wisata->harga_paket }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Deskripsi Paket Wisata</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $paket_wisata->deskripsi_paket }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Foto Paket</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none"><img src="{{ url('foto_paket/'.$paket_wisata->foto_paket) }}" width="100px"></th>
                        </tr>
                    </table>
                </div>
                <table class="table">
                    <tr>
                        <th style="border: none">
                            <a href="/admin/paket-wisata" class="btn btn-dark">Kembali</a>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
