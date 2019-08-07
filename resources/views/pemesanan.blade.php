@extends('layout.template_dashboard')
@section('judul')
    Pemesanan
@endsection
@section('subjudul')
    Ticketing | Pemesanan
@endsection
@section('content')


    <div class="row" style="margin: 0">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="custom-blue text-white mt-5 p-2">
                <h3 class="text-center">
                {{ $jadwal->kotaBerangkat->kota_berangkat }} - {{ $jadwal->kotaTujuan->kota_tujuan }}
                </h3>
            </div>
            <input type="hidden" name="id" value="{{ $jadwal->id }}" id="id">
            <div class="bg-white p-2">
                <div class="form-group">
                    <label for="bis">Bis : </label>
                    <input type="text" class="form-control" disabled value="{{ $jadwal->bis->bis }}">
                </div>
                <div class="form-group">
                    <label for="jadwal">Jadwal Berangkat : </label>
                    <input type="text" class="form-control" disabled value="{{ $jadwal->jadwal_berangkat }}">
                </div>
                <div class="form-group">
                    <label for="jadwal">Harga : </label>
                    <input type="text" class="form-control" disabled value="Rp. {{ $jadwal->harga }} / Orang">
                </div>
                <div class="form-group">
                    <label for="tiket">Jumlah tiket yang ingin dibeli : </label>
                    <input type="number" id="tiket" class="form-control" onfocusout="ini()">
                </div>
                <a href="" class="btn custom-blue text-white lanjut">Lanjut</a>
            </div>
        </div>
    </div>
<script>
    function ini() {
        $('.lanjut').attr('href', 'pemesanan/' + $("#tiket").val() + '/' + $('#id').val());
    }
</script>
@endsection