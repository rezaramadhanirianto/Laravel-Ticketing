@extends('layout.template_dashboard')
@section('judul')
    Pemesanan
@endsection
@section('subjudul')
    Ticketing | Pemesanan
@endsection
@section('content')

<div class="row" style="margin: 0">
    <div class="col-lg-1"></div>
    @foreach($tiket as $t)
    <div class="col-lg-2 bg-white p-2 rounded m-5">
        <a href="lihat-tiket/{{ $t->id }}" class="btn btn-primary d-flex justify-content-center">
            {{ $t->jadwal->kotaBerangkat->kota_berangkat }} - {{ $t->jadwal->kotaTujuan->kota_tujuan }}
            <br>
            {{ $t->penumpang->nama }}<br> 
                Lihat Tiket !
            </a>
    </div>
@endforeach
</div>

@endsection