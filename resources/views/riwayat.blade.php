@extends('layout.template_dashboard')
@section('judul')
    Pemesanan
@endsection
@section('subjudul')
    Ticketing | Pemesanan
@endsection
@section('content')

    <div class="row" style="margin: 0;">
        <?php $i = 0?>
        @foreach($head as $h)
        <?php $i++ ?>
            <div class="col-lg-3"></div>
            <div class="col-lg-6 mt-5">
                <div class="custom-blue p-2 text-center text-white">
                    <h3>RIWAYAT TIKET</h3>
                </div>
                <div class="bg-white p-2 mt-5">
                    @foreach($h->pemesanan as $p)
                        <div class="card">
                            <div class="card-head p-2">
                                <a href="cek-pembayaran/{{ $h->id }}">
                                    <h6>{{ $p->jadwal->kotaBerangkat->kota_berangkat }} - {{ $p->jadwal->kotaTujuan->kota_tujuan }}</h6>
                                </a>
                            </div>
                            <div class="card-body">
                                <p>Nama Bis : {{ $p->jadwal->bis->bis }}</p>
                                <p>Nama Penumpang : {{ $p->caripenumpang->nama }}</p>
                                <p>Status : Belum Bayar</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
        @if($i == 0)
        <div class="col-lg-3"></div>
            <div class="col-lg-6 mt-5">
                <div class="custom-blue p-2 text-center text-white">
                    <h3>RIWAYAT TIKET</h3>
                </div>
                <div class="bg-white p-2 mt-5">
                        <div class="card">
                            <div class="card-head p-2">
                                <a>
                                    <h6>Anda belum membeli apapun</h6>
                                </a>
                            </div>
                            <div class="card-body">
                            </div>
                        </div>
                </div>
            </div>
        @endif
    </div>
    <script>
        $('body').addClass('bg-secondary');
    </script>
@endsection