<div class="row d-flex justify-content-around my-3">
    @foreach($data['wisata'] as $key => $item)
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ url('gambar_wisata/'.$item->gambar_wisata) }}" alt="Card image cap" style="width: 15rem, height:15rem;" alt="Card image cap">
        <div class="card-body">
            <h5>{{ $item->nama_wisata }}</h5>
            <p class="card-text">{{ \Str::limit($item->deskripsi_wisata, 100)}}</p>
            <a href="/customer/destination-detail" class="btn btn-book btn-primary">Detail</a>
        </div>
    </div> 
    @endforeach                 
</div>
<div class="d-flex justify-content-center mt-2 mb-5">
    <a href="/customer/destination" class="btn btn-outline-info">See More Destination</a>
</div>
