@extends('layouts.app')

@section('title', 'Administrator | Edit Paket Wisata')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/paket-wisata">Paket Wisata</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Edit Paket Wisata</b></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.paket-wisata.update', $paket_wisata->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <label>Nama Paket Wisata</label>
                            <input name="nama_paket" class="form-control @error('nama_paket') is-invalid @enderror" value="{{ $paket_wisata->nama_paket }}">
                            <div class="invalid-feedback">
                                @error('nama_paket')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>List Wisata 1</label>
                            <select class="form-control theSelect" name="id_wisata_1">
                                <option>Pilih List Wisata 1</option>
                                 @foreach ($wisata as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_wisata}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>List Wisata 2</label>
                            <select class="form-control theSelect" name="id_wisata_2">
                                <option>Pilih List Wisata 2</option>
                                 @foreach ($wisata as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_wisata}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>List Wisata 3</label>
                            <select class="form-control theSelect" name="id_wisata_3">
                                <option>Pilih List Wisata 3</option>
                                 @foreach ($wisata as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_wisata}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>List Wisata 4</label>
                            <select class="form-control theSelect" name="id_wisata_4">
                                <option>Pilih List Wisata 4</option>
                                 @foreach ($wisata as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_wisata}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                        <label>Harga Paket Wisata</label>
                            <input name="harga_paket" class="form-control @error('harga_paket') is-invalid @enderror" value="{{ $paket_wisata->harga_paket }}">
                            <div class="invalid-feedback">
                                @error('harga_paket')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Wisata</label>
                            <textarea name="editor1"  class="form-control">{{ $wisata->deskripsi_wisata }}</textarea>
                        </div>
                        <div class="form-group">
                        <label>Harga Paket Wisata</label>
                            <input name="harga_wisata" class="form-control @error('harga_wisata') is-invalid @enderror" value="{{ $paket_wisata->harga_wisata }}">
                            <div class="invalid-feedback">
                                @error('harga_wisata')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label>Gambar Wisata</label> <br>
                            <input type="file" name="foto_paket" class="form-control @error('foto_paket') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('gambar_wisata')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="/admin/paket-wisata" class="btn btn-dark btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-dark btn-sm">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
