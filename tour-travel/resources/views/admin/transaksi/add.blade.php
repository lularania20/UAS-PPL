@extends('layouts.app')

@section('title', 'Administrator | Tambah Transaksi')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.transaksi') }}">Data Transaksi</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Tambah Transaksi</b></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.transaksi.save') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Data Pelanggan</label>
                            <select class="form-control theSelect" name="id_pelanggan">
                                <option>Data Pelanggan</option>
                                @foreach ($pelanggan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama. ' | ' .$item->telepon. ' | ' .$item->alamat}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Paket Wisata</label>
                            <select class="form-control theSelect" name="id_paket">
                                <option>Pilih Paket Wisata</option>
                                @foreach ($paket_wisata as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_paket }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="id_status" value="{{ 1 }}" />
                        <div class="form-group mt-4">
                            <a href="{{ route('admin.transaksi') }}" class="btn btn-dark btn-sm">Kembali</a>
                            <button type="submit" class="btn btn-dark btn-sm">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@section('scripts')
<script>
    $(".theSelect").select2();
</script>
@endsection