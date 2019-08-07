@extends('admin.layout')
@section('judul')
    TICKETING | ADMIN
@endsection
@section('jadwal')
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
                    <button class="btn btn-primary mb-2" id="tambah" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"></i>
                        Tambah Jadwal
                    </button>
                    <div class="table-responsive">
                    
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Bis</td>
                                    <td>Jadwal Berangkat</td>
                                    <td>Berangkat</td>
                                    <td>Tujuan</td>
                                    <td>Harga</td>
                                    <td>Jumlah Kursi</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0 ?>
                                @foreach($jadwal as $b)
                                <?php $i++?>
                                    <tr>
                                        <td>
                                            {{ $i }}
                                        </td>
                                        <td>
                                            {{ $b->bis->bis }}
                                        </td>
                                        <td>
                                            {{ $b->jadwal_berangkat }}
                                        </td>
                                        <td>
                                            {{ $b->kotaBerangkat->kota_berangkat }}
                                        </td>
                                        <td>
                                            {{ $b->kotaTujuan->kota_tujuan }}
                                        </td>
                                        <td>
                                            {{ $b->harga }}
                                        </td>
                                        <td>
                                            {{ $b->jumlah_kursi }}
                                        </td>
                                        <td>
                                            <a id="edit" class=" edit btn text-white btn-primary" data-tujuan="{{ $b->tujuan }}" data-harga="{{ $b->harga }}" data-bus="{{ $b->bis->id }}" data-jadwal="{{$b->jadwal_berangkat}}" data-id="{{ $b->id }}"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="jadwal/hapus/{{ $b->id }}" class="hapus btn text-white btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash"></i> Hapus</a>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
            </div>
            <form action="admin/jadwal/post" method="post">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="bis">Bis</label>
                        <select name="bis" id="bis" class="form-control">
                            @foreach($bis as $b)
                                <option value="{{ $b->id }}">{{ $b->bis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jadwal_berangkat">Jadwal Berangkat</label>
                        <input required type="datetime-local" id="jadwal_keberangkatan" name="jadwal_berangkat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="berangkat">Berangkat</label>
                        <select id="berangkat" name="berangkat" class="form-control">
                            @foreach($kotaBerangkat as $t)
                                <option value="{{ $t->id }}">{{ $t->kota_berangkat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <select id="tujuan" name="tujuan" class="form-control">
                            @foreach($kotaTujuan as $t)
                                <option value="{{ $t->id }}">{{ $t->kota_tujuan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input required type="text" id="harga" name="harga" class="form-control" onkeypress="return event.charCode >= 46 && event.charCode <= 57 && event.charCode !== 47">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('.table').dataTable();
    $('#harga').mask("000.000.000.000");
    $('#tambah').click(function () {
        $('#id').val("");
        $('#harga').val("");
        $('#tujuan').val("");
        $('#jadwal_berangkat').val("");
        $('#bis').val("");
    })
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
    $('.edit').click(function () {
        $('#id').val($(this).data('id'));
        $('#harga').val($(this).data('harga'));
        $('#tujuan').val($(this).data('tujuan'));
        $('#jadwal_berangkat').val($(this).data('jadwal'));
        $("#bis option[value= '" + $(this).data('bus') + "']").prop('selected', true);
        $('#exampleModal').modal(true);
    })
</script>
@endsection