@extends('layouts.app')

@section('title', 'Administrator | Transaksi')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active">Transaksi</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> <b>Data Transaksi</b></h3>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.transaksi.add') }}" class="btn btn-dark btn-sm mb-3">Tambah Data</a>

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <!-- <th>Kategori Paket</th> -->
                        <!-- <th>Harga Paket</th>
                        <th>Foto Paket</th> -->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($transaksi as $key => $item)
                        <tr class="text-center">
                            <td>{{ $transaksi->firstItem() + $key }}</td>
                            <td>{{ $item->pelanggan->nama }}</td>
                            <td>
                                <a href="/admin/transaksi/detail/{{ $item->id }}"> <button type="button" class="btn btn-sm btn-primary">Detail</button></a>
                                <a href="/admin/transaksi/edit/{{ $item->id }}"> <button type="button" class="btn btn-sm btn-warning">Edit</button></a>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $item->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            @if (count($transaksi) < 1)
            <div class="float-left">
                Showing
                {{ $transaksi->total() }}
                entries
            </div>
            <div class="float-right">
                {{ $transaksi->links("pagination::bootstrap-4") }}
            </div>
            @else
            <div class="float-left">
                Showing
                {{ $transaksi->firstItem() }}
                to 
                {{ $transaksi->lastItem() }}
                of
                {{ $transaksi->total() }}
                entries
            </div>
            <div class="float-right">
                {{ $transaksi->links("pagination::bootstrap-4") }}
            </div>
            @endif
        </div>
        <!-- /.card-body -->
    </div>

    @foreach ($transaksi as $data)
        <div class="modal fade" id="delete{{ $data->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Transaksi "{{ $data->nama }}"</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                        <a href="{{ route('admin.transaksi.delete', $data->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection
