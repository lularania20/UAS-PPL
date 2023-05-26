@extends('layouts.app')

@section('title', 'Administrator | Detail Transaksi')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/transaksi">Transaksi</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Detail Transaksi</b></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <table class="table table-alasan">
                        <tr>
                            <th width="200px" style="border: none">Nama Pelanggan</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $transaksi->pelanggan->nama }}</th>
                        </tr>
                        <tr>
                            <th width="200px" style="border: none">No Telepon</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $transaksi->pelanggan->telepon }}</th>
                        </tr>
                        <tr>
                            <th width="200px" style="border: none">Nama Paket</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $transaksi->paket_wisata->nama_paket }}</th>
                        </tr>
                        <tr>
                            <th width="200px" style="border: none">Harga Paket</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $transaksi->paket_wisata->harga_paket }}</th>
                        </tr>
                        <tr>
                            <th width="200px" style="border: none">Status</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $transaksi->status->status }}</th>
                        </tr>
                        @if ($transaksi->id_status == 2)
                        <tr>
                            <th width="200px" style="border: none">Keterangan Pembayaran</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $transaksi->keterangan_pembayaran }}</th>
                        </tr>
                        <tr>
                            <th width="200px" style="border: none">Tanggal Keberangkatan</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ Carbon\Carbon::parse($transaksi->tanggal_keberangkatan)->format('d-m-Y H:i:s') }}</th>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
                <table class="table">
                    <tr>
                        <th style="border: none">
                        <a href="{{ route('admin.transaksi') }}" class="btn btn-dark">Kembali</a>
                            @if ($transaksi->id_status == '1')
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#approve{{ $transaksi->id }}">Konfirmasi Pelunasan</button>
                            @else
                                <button type="button" class="btn btn-success" disabled>Konfirmasi Pelunasan</button>
                            @endif
                        </th>
                    </tr>
                </table> 
            </div>
        </div>

    <div class="modal fade" id="approve{{ $transaksi->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Transaksi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="formApprove">
                    <div class="modal-body">
                        <p>Konfirmasi Transaksi <span style="color: green;"><b>{{ $transaksi->paket_wisata->nama_paket }}</b></span> dari <span style="color: black;"><b>{{ $transaksi->pelanggan->nama }}</b></span>?</p>
                        @csrf
                        <input type="hidden" class="transaksi_id" name="transaksi_id" value="{{ $transaksi->id }}" id="data{{ $transaksi->id }}" />
                        <div class="form-group">
                            <label>Keterangan Pembayaran</label>
                            <textarea name="keterangan_pembayaran" id="keterangan_pembayaran" class="keterangan_pembayaran form-control @error('keterangan_pembayaran') is-invalid @enderror" rows="3" placeholder="Keterangan Pembayaran" value="{{ old('keterangan_pembayaran') }}"></textarea>
                            <div class="invalid-feedback">
                                @error('keterangan_pembayaran')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Keberangkatan</label>
                            <input name="tanggal_keberangkatan" type="date" id="tanggal_keberangkatan" class="tanggal_keberangkatan form-control @error('tanggal_keberangkatan') is-invalid @enderror" placeholder="Tanggal Keberangkatan" value="{{ old('tanggal_keberangkatan') }}">
                            <div class="invalid-feedback">
                                @error('tanggal_keberangkatan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-sm btn-default closeApprove" data-dismiss="modal">Tutup</button>
                        <button type="submit" id="submitApprove" class="btn btn-sm btn-success">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.formApprove').on('submit', function(e) {
                e.preventDefault();

                var id_transaksi = $(this).find('input[name=transaksi_id]').val();
                var keterangan_pembayaran = $(this).find('.keterangan_pembayaran').val();
                var tanggal_keberangkatan = $(this).find('.tanggal_keberangkatan').val();
                var url = "{{ route('admin.transaksi.approve') }}?id_transaksi=" + id_transaksi + "&keterangan_pembayaran=" + keterangan_pembayaran + "&tanggal_keberangkatan=" + tanggal_keberangkatan + "&id_status=2&_token={{ csrf_token() }}";

                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(response) {
                        if (response.success === true) {
                            Swal.fire('Sukses', response.message, "success").then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }
                    },
                    error: function(res, err) {
                        if (res.responseJSON.errors.keterangan_pembayaran != "undefined") {
                            alert(res.responseJSON.errors.keterangan_pembayaran);
                        }
                    },
                });
            });
        });
    </script>
@endsection
