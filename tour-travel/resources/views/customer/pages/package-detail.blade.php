@extends('customer.layouts.customer')

@push('style')
    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/customer/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/package-detail.css')}}">
@endpush

@section('content')

    <div class="container landing"> 
        <div class="row">
            <div class="col-4 title mt-5">
                <h2>{{ $paket_wisata->nama_paket }}</h2>
                <h3 class="mt-5 card-price">Rp. {{ $paket_wisata->harga_paket }} ,-</h3>
                <a href="/customer/checkout" class="btn btn-book btn-primary mt-4">Check Out</a>
            </div>
            <div class="col-8 mt-5">
                <img src="{{ url('gambar_wisata/'.$paket_wisata->foto_paket) }}" class="card-img img-fluid">
            </div>
        </div>
        <div class="my-3">
            <h3>Destinasi</h3>
            <div class="d-flex justify-content-between">
                <a class="button-card">
                    <div class="card card-image" style="width: 18rem;">
                        <img src="{{ url('gambar_wisata/'.$paket_wisata->gambar_wisata_1) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $paket_wisata->nama_wisata_1 }}</h5>
                        </div>
                    </div>
                </a>
                <a class="button-card">
                    <div class="card card-image" style="width: 18rem;">
                        <img src="{{ url('gambar_wisata/'.$paket_wisata->gambar_wisata_2) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $paket_wisata->nama_wisata_2 }}</h5>
                        </div>
                    </div>
                </a>
                <a class="button-card">
                    <div class="card card-image" style="width: 18rem;">
                        <img src="{{ url('gambar_wisata/'.$paket_wisata->gambar_wisata_3) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $paket_wisata->nama_wisata_3 }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="mb-5">
            <h3>Deskripsi</h3>
            <p>{{ $paket_wisata->deskripsi_paket }}</p>
        </div>
    </div>

@endsection


