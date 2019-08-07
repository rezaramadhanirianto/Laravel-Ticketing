@extends('layout.template_dashboard')
@section('judul')
    TICKETING | Dashboard
@endsection
@section('subjudul')
    TICKETING BIS
@endsection
@section('content')
<div class="container">
    <div class="row" style="margin: 0">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 bg-white rounded p-2 mt-3">
                <a href="{{ route('riwayat') }}" class="btn btn-primary">Riwayat Tiket</a>
                @if($hitung > 0)
                    <a href="tiket" class="btn custom-blue text-white">Lihat tiket yang sudah dibeli</a>
                @endif
                <div class="form-group">
                    <label for="search">Kemana Destinasi Anda Sekarang : </label>
                    <input type="text" class="form-control" name="cari" id="cari" autocomplete="off" placeholder="Mau kemana anda hari ini ?">
                </div>
        </div>
    </div>
</div>
<div class="row" id="row">
</div>
<script>
$("body").addClass('bg-secondary');
$('#cari').keyup(function () {
    if($(this).val() == ""){

    }else{        
        
        $.ajax({
            url: 'cari/' + $(this).val(),
            method: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('#row').empty();
                var td = "";
                for (let i = 0; i < data.length; i++) {
                    if(data[i].jumlah_kursi == 0){

                    }else{
                    td+='<div class="col-lg-3 m-1"> <div class="card"> <div class="card-header bg-primary text-white">' + data[i].kotaBerangkat  + ' - ' + data[i].kotaTujuan + '</div><div class="card-body"><h5 class="card-title">' + data[i].bis.bis + '</h5><p class="card-text"> Harga : '  + data[i].harga +  '<br> Jadwal Keberangkatan : ' + data[i].jadwal_berangkat + '</p><a href="dashboard/' + data[i].id + '" class="btn btn-primary">Pesan Sekarang</a></div></div></div>';   
                    }
                }
                $('#row').html(td).on('change');
                
            }
        })
    }
    
})
</script>
@endsection