@extends('layouts.app')

@section('title', 'Administrator | Edit Pelanggan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/pelanggan">Pelanggan</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Edit Pelanggan</b></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.pelanggan.update', $pelanggan->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $pelanggan->nama }}">
                            <div class="invalid-feedback">
                                @error('nama')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $pelanggan->email }}">
                            <div class="invalid-feedback">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input name="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ $pelanggan->telepon }}">
                            <div class="invalid-feedback">
                                @error('telepon')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ $pelanggan->alamat }}">
                            <div class="invalid-feedback">
                                @error('alamat')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('admin.pelanggan') }}" class="btn btn-dark btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-dark btn-sm">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
