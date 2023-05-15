@extends('layouts.app')

@section('title', 'Administrator | Edit Kategori Wisata')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/kategori-wisata">Kategori Wisata</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Edit Kategori Wisata</b></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kategori-wisata.update', $kategori_wisata->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nama Kategori Wisata</label>
                            <input name="kategori_wisata" class="form-control @error('kategori_wisata') is-invalid @enderror" value="{{ $kategori_wisata->kategori_wisata }}">
                            <div class="invalid-feedback">
                                @error('kategori_wisata')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="/admin/kategori-wisata" class="btn btn-dark btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-dark btn-sm">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
