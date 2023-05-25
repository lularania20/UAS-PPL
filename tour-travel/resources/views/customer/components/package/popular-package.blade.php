<div class="row d-flex justify-content-around my-3">
    @foreach($data['paket_wisata'] as $key => $item)
    <div class="card mb-3" style="width: 20rem;">
        <img class="card-img-top" src="{{ url('gambar_wisata/'.$item->foto_paket) }}" alt="Card image cap" style="width: 15rem, height:15rem;">
        <div class="card-body">
            <h5>{{ $item->nama_paket }}</h5>
            <p class="card-text">{{ \Str::limit($item->deskripsi_paket, 200)}}</p>
            <a href="{{ url('customer/package-detail/'.$item->id)}}" class="btn btn-book btn-primary">Detail</a>
        </div>
    </div> 
    @endforeach
</div>
