@extends('customer.layouts.customer')

@push('style')
    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/customer/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/destination-detail.css')}}">
@endpush

@section('content')

    <div class="container landing"> 
        <div class="row">
            <div class="col-4 title mt-5">
                <h2>{{ $wisata->nama_wisata }}</h2>
                <h3 class="mt-5 card-price">Rp. {{ $wisata->harga_wisata }},-</h3>
            </div>
            <div class="col-6 mt-5">
                <img src="{{ url('gambar_wisata/'.$wisata->gambar_wisata) }}" class="card-img img-fluid">
            </div>
        </div>
        <div>
            <h3>Deskripsi</h3>
            <p>{{ $wisata->deskripsi_wisata }}</p>
        </div>
    </div>
@endsection
