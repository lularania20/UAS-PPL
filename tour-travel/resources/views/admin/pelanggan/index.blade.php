@extends('layouts.app')

@section('title', 'Administrator | Pelanggan')

@section('header')
<div class="col-sm-4">
    <form action="/admin/pelanggan" method="get">
        <div class="input-group">
            <input type="search" name="search" class="form-control" placeholder="Nama Pelanggan">
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
            <li class="breadcrumb-item active">Pelanggan</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Data Pelanggan</b></h3>
        </div>
        <div class="card-body">
            <a href="/admin/pelanggan/add" class="btn btn-dark btn-sm mb-3">Tambah Data</a>

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($pelanggan as $key => $data)
                        <tr class="text-center">
                            <td>{{ $pelanggan->firstItem() + $key }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->telepon }}</td>
                            <td>
                                <a href="/admin/pelanggan/detail/{{ $data->id }}" class="btn btn-sm btn-primary">Detail</a>
                                <a href="/admin/pelanggan/edit/{{ $data->id }}" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id }}">
                                    Delete
                                </button> 
                            </td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
            <br>
            @if ($pelanggan->isEmpty())
                <div class="float-left">
                    Showing {{ $pelanggan->total() }} entries
                </div>
                <div class="float-right">
                    {{ $pelanggan->links() }}
                </div>
            @else
                <div class="float-left">
                    Showing {{ $pelanggan->firstItem() }} to {{ $pelanggan->lastItem() }} of {{ $pelanggan->total() }} entries
                </div>
                <div class="float-right">
                    {{ $pelanggan->links() }}
                </div>
            @endif

        </div>
    </div>

    @foreach ($pelanggan as $data)
        <div class="modal fade" id="delete{{ $data->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Data "{{ $data->nama }}"</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin menghapus data {{ $data->nama }} | {{$data->email}} ini?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                        <a href="/admin/pelanggan/delete/{{ $data->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection