@extends('admin.layout')
@section('judul')
    TICKETING | ADMIN
@endsection
@section('pembayaran')
    active
@endsection
@section('content')
<style>
.modal-backdrop{
    z-index: -1;
}
</style>
<link rel="stylesheet" href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
<script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('datatables/datatables.min.js') }}"></script>
<script src="{{ asset('datatables/dataTables.select.min.js') }}"></script>
<!-- <div class="section-body"> -->
    <div class="row hariKerja">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Konfirmasi</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Bukti</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0 ?>
                                @foreach($konfirmasi as $b)
                                <?php $i++?>
                                    <tr>
                                        <td>
                                            {{ $i }}
                                        </td>
                                        <td>
                                            <img width="200px" src="{{ url('bukti_upload/' . $b->bukti) }}" alt="">
                                        </td>
                                        <td>
                                            <a href="update-pembayaran/{{ $b->id_pemesanan_head }}/{{ $b->id }}" class="btn btn-primary text-white">Konfirmasi</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.table').dataTable();
    $('#tambah').click(function () {
        $('#id').val(" ");
        $('#bis').val(" ");
        $('#kursi').val(" ");
    })
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
    $('.edit').click(function () {
        $('#id').val($(this).data('id'));
        $('#bis').val($(this).data('bus'));
        $('#kursi').val($(this).data('kursi'));
        $('#exampleModal').modal(true);
    })
</script>
@endsection