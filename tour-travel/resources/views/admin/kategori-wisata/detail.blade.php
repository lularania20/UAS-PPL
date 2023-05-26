@extends('layouts.app')

@section('title', 'Administrator | Detail Kategori Wisata')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/kategori-wisata">Kategori Wisata</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Detail Kategori Wisata</b></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <table class="table">
                        <tr>
                            <th width="150px" style="border: none">ID</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $kategori_wisata->id }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Kategori Wisata</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $kategori_wisata->kategori_wisata }}</th>
                        </tr>
                    </table>
                </div>
                <table class="table">
                    <tr>
                        <th style="border: none">
                            <a href="/admin/kategori-wisata" class="btn btn-dark">Kembali</a>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
