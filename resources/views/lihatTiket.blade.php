@extends('layout.template')
@section('judul')
    Tiket
@endsection
@section('content')
<style>
    .hide{
        visibility: hidden;
        display: none;
    }
</style>
    <button class="btn custom-blue print d-flex justify-content-center">Print</button>
    <div class="row" style="margin: 0">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 d-flex justify-content-center">
            <table border="1" class="p-2">
                <thead>
                    <tr>
                        <td colspan="2">
                            <h6 class="text-center">TICKETING | BUS</h6>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-2">
                            Nama : 
                        </td>
                        <td class="p-2">
                            {{ $tiket->penumpang->nama }}
                        </td>
                    </tr>
                    <tr>
                        <td class="p-2">
                            Pemesan Tiket :
                        </td>
                        <td class="p-2">
                            {{ $tiket->user->nama }}
                        </td>
                    </tr>
                    <tr>
                        <td class="p-2">
                            Bis : 
                        </td>
                        <td class="p-2">
                            {{ $tiket->jadwal->bis->bis }}
                        </td>
                    </tr>
                    <tr>
                        <td class="p-2">
                            Perjalanan :
                        </td>
                        <td class="p-2">
                            {{ $tiket->jadwal->kotaBerangkat->kota_berangkat }} - {{ $tiket->jadwal->kotaTujuan->kota_tujuan }}
                        </td>
                    </tr>
                    <tr>
                        <td class="p-2">
                            Harga : 
                        </td>
                        <td class="p-2">
                            {{ $tiket->jadwal->harga }}
                        </td>
                    </tr>
                    <tr>
                        <td class="p-2">
                            Jadwal : 
                        </td>
                        <td class="p-2">
                            {{ $tiket->jadwal->jadwal_berangkat }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            Untuk pertanyaan lebih lanjut <br>
                            hubungi 08123748127
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $('.print').click(function () {
            
            $(this).addClass("hide");
            window.print();
        })
    </script>
@endsection