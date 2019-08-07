@extends('admin.layout')
@section('judul')
    TICKETING | ADMIN
@endsection
@section('user')
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
<script src="{{ asset('js/jquery_mask.min.js') }}"></script>
<div class="section-body">
    <div class="row hariKerja">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Jadwal</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama</td>
                                    <td>Email</td>
                                    <td>Nomor Telp</td>
                                    <!-- <td>Aksi</td> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0 ?>
                                @foreach($users as $b)
                                <?php $i++?>
                                    <tr>
                                        <td>
                                            {{ $i }}
                                        </td>
                                        <td>
                                            {{ $b->nama }}
                                        </td>
                                        <td>
                                            {{ $b->email }}
                                        </td>
                                        <td>
                                            {{ $b->no }}
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
    $('#harga').mask("000.000.000.000");

</script>
@endsection