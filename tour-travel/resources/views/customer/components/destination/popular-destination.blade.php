<div class="row d-flex justify-content-around my-3">
@foreach($data['wisata'] as $key => $item)
    <div class="card mb-3" style="width: 18rem;">
        <img class="card-img-top" src="{{ url('gambar_wisata/'.$item->gambar_wisata) }}" alt="Card image cap" style="width: 15rem, height:15rem;">
        <div class="card-body">
            <h5>{{ $item->nama_wisata }}</h5>
            <p class="card-text">{{ \Str::limit($item->deskripsi_wisata, 200)}}</p>
            <a href="/customer/destination-detail" class="btn btn-book btn-primary">Detail</a>
        </div>
    </div> 
    @endforeach                
</div>