@extends('layouts.app')

@section('title', 'Administrator | Paket Wisata')

@section('header')
<div class="col-sm-4">
    <form action="/admin/paket-wisata" method="get">
        <div class="input-group">
            <input type="search" name="search" class="form-control" placeholder="Nama Paket Wisata">
            <div class="input-group-append">
                <button type="submit" class="btn btn-dark">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </form>
</div>
    <div class="col-sm-8">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active">Paket Wisata</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> <b>Data Paket Wisata</b></h3>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.paket-wisata.add') }}" class="btn btn-dark btn-sm mb-3">Tambah Data</a>

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Paket Wisata</th>
                        <th>Harga Paket</th>
                        <th>Foto Paket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($paket_wisata as $key => $item)
                        <tr class="text-center">
                            <td>{{ $paket_wisata->firstItem() + $key }}</td>
                            <td>{{ $item->nama_paket }}</td>
                            <td>{{ $item->harga_paket }}</td>
                            <td><img src="{{ url('foto_paket/'.$item->foto_paket) }}" width="100px"></td>
                            <td>
                                <a href="/admin/paket-wisata/detail/{{ $item->id }}"> <button type="button" class="btn btn-sm btn-primary">Detail</button></a>
                                <a href="/admin/paket-wisata/edit/{{ $item->id }}"> <button type="button" class="btn btn-sm btn-warning">Edit</button></a>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $item->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            @if (count($paket_wisata) < 1)
            <div class="float-left">
                Showing
                {{ $paket_wisata->total() }}
                entries
            </div>
            <div class="float-right">
                {{ $paket_wisata->links("pagination::bootstrap-4") }}
            </div>
            @else
            <div class="float-left">
                Showing
                {{ $paket_wisata->firstItem() }}
                to 
                {{ $paket_wisata->lastItem() }}
                of
                {{ $paket_wisata->total() }}
                entries
            </div>
            <div class="float-right">
                {{ $paket_wisata->links("pagination::bootstrap-4") }}
            </div>
            @endif
        </div>
        <!-- /.card-body -->
    </div>

    @foreach ($paket_wisata as $data)
        <div class="modal fade" id="delete{{ $data->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Paket Wisata "{{ $data->nama_paket }}"</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                        <a href="{{ route('admin.paket-wisata.delete', $data->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection
