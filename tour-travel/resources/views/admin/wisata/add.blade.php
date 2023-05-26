@extends('layouts.app')

@section('title', 'Administrator | Tambah Wisata')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/wisata">Wisata</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Tambah Wisata</b></h3>
        </div>
        <div class="card-body">
            <form action="/admin/wisata/save" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <label>Nama Wisata</label>
                            <input name="nama_wisata" class="form-control @error('nama_wisata') is-invalid @enderror" value="{{ old('nama_wisata') }}">
                            <div class="invalid-feedback">
                                @error('nama_wisata')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kategori Wisata</label>
                            <select class="form-control theSelect" name="id_kategori_wisata">
                                <option>Pilih Kategori Wisata</option>
                                 @foreach ($kategori_wisata as $item)
                                    <option value="{{ $item->id }}">{{ $item->kategori_wisata}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Wisata</label>
                            <textarea name="editor1"  class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                        <label>Harga Wisata</label>
                            <input name="harga_wisata" class="form-control @error('harga_wisata') is-invalid @enderror" value="{{ old('harga_wisata') }}">
                            <div class="invalid-feedback">
                                @error('harga_wisata')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                        <label>Alamat Wisata</label>
                            <input name="alamat_wisata" class="form-control @error('alamat_wisata') is-invalid @enderror" value="{{ old('alamat_wisata') }}">
                            <div class="invalid-feedback">
                                @error('alamat_wisata')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label>Gambar Wisata</label> <br>
                            <input type="file" name="gambar_wisata" class="form-control @error('gambar_wisata') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('gambar_wisata')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="/admin/wisata" class="btn btn-dark btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-dark btn-sm">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
