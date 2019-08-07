@extends('layout.template_dashboard')
@section('judul')
    Pemesanan
@endsection
@section('subjudul')
    Ticketing | Pemesanan
@endsection
@section('content')

    <div class="row mt-5" style="margin: 0">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 mt-5 bg-white p-2 rounded text-center">
            <h4>Silahkan Melakukan Pembayaran Ke Nomor Rekening Dibawah Ini !</h4>
            <h5 class="text-danger font-weight-bold">0123456789</h5>
            <h5>Total Harga : {{ $total }}</h5>
            <p>
                Note <br>
                <span class="text-danger">
                Jika Pembayaran kurang dari harga maka uang yang sudah dibayarkan tidak dapat dikembalikan
                </span>
            </p>
            <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <label for="">Silahkan Upload Bukti Pembayaran</label>
                <input type="file" name="file" id="img" class="form-control">
                <button class="btn custom-blue text-white">Upload</button>
            </form>
        </div>
    </div>
<script>
    function ini() {
        $('.lanjut').attr('href', 'pemesanan/' + $("#tiket").val() + '/' + $('#id').val());
    }
</script>
@endsection