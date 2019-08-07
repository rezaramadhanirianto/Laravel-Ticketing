@extends('layout.template_dashboard')
@section('judul')
    Pemesanan
@endsection
@section('subjudul')
    Ticketing | Pemesanan
@endsection
@section('content')

    <div class="row mt-2" style="margin: 0;">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <div class="bg-white p-2 rounded">
            <form action="{{ route('pesan-save') }}" method="post">
            {{ csrf_field() }}
                <input type="hidden" name="id_jadwal" value="{{ $id }}">
                @for($i = 1; $i <= $jumlah; $i++)
                    <div style="border: 2px solid rgb(103, 119, 239);">        
                        <div class="form-group pr-2 pl-2">
                            <label for="nama">Nama : </label>
                            <input type="text" required name="nama[]" class="form-control" placeholder="Nama">
                        </div>
                        <div class="form-group pr-2 pl-2">
                            <label for="umur">Umur : </label>
                            <input type="number" required name="umur[]" class="form-control" placeholder="Umur">
                        </div>        
                    </div>
                @endfor
                <button class="btn text-white custom-blue m-2">Simpan</button>
            </form>
        </div>
    </div>
    </div>

@endsection