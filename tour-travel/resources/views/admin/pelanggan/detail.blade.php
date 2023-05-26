@extends('layouts.app')

@section('title', 'Administrator | Detail Pelanggan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/pelanggan">Pelanggan</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Detail Pelanggan</b></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <th width="150px" style="border: none">Nama</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $pelanggan->nama }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Email</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $pelanggan->email }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Telepon</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $pelanggan->telepon }}</th>
                        </tr>
                        <tr>
                            <th width="150px" style="border: none">Alamat</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $pelanggan->alamat }}</th>
                        </tr>
                    </table>
                </div>
                <table class="table">
                    <tr>
                        <th style="border: none">
                            <a href="{{ route('admin.pelanggan') }}" class="btn btn-dark">Kembali</a>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
