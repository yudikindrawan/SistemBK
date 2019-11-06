@extends('layouts.master')
@section ('title', 'Data Pelanggaran- Sistem Informasi Bimbingan Konseling')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Sistem Bimbingan Konseling</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pelanggaran</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pelanggaran</h5>
                        <div class="card">
                        <div class="col-xs-7">
                            <a href="javascript:void(0)"><button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">Tambah</button></a>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pelanggaran</th>
                                                <th>Poin Pelanggaran</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0 ;?>
                                            @foreach($pelanggarans as $pelanggaran)
                                            <?php $no++ ;?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $pelanggaran->nama_pelanggaran }}</td>
                                                <td>{{ $pelanggaran->poin_pelanggaran }}</td>
                                                <td style="white-space: nowrap; ">
                                                    <a onClick="modalEditTriger( {{$pelanggaran->id}} )" data-toggle="modal" class="btn btn-info btn-sm" style="color:white;">Ubah</a>
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
        </div>
    </div>
<div class="modalKu"></div>
<!-- modal create -->
<div class="modal fade" id="myModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form class="formuser" id="formuser" action="{{ route('pelanggaran.store') }}" method="POST">
        {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Pelanggaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" class="form-control"/>
                    <div class="form-group">
                        <label>Nama Pelanggaran</label>
                        <input type="text" name="nama_pelanggaran" id="nama_pelanggaran" class="form-control " placeholder="Masukan Nama Pelanggaran" required/>
                    </div>
                    <div class="form-group">
                        <label>Poin Pelanggaran</label>
                        <input type="text" name="poin_pelanggaran" id="poin_pelanggaran" class="form-control " placeholder="Masukan Poin Pelanggaran" required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-success btn-sm" value="Simpan">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end modal create-->
@endsection
@push('scripts')
<script>
     // MODAL EDIT

    function modalEditTriger(id){
        jQuery.noConflict();
        $.ajax({
            url     : "{{ route('editpelanggaran') }}",
            method  : 'get',
            data    : {
            'id' : id
            },
            success : function(response){
            console.log(response);
                $('.modalKu').html(response);
                $('#editModal').modal({ backdrop: 'static', keyboard: false });
            }
        });
    }

    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('id')
        var modal = $(this)
            modal.find('#id').val(recipient)
    })
</script>
<script>
    /****************************************
    *       Basic Table                   *
    ****************************************/
    $('#zero_config').DataTable();

</script>
<script>
    /*datwpicker*/
        jQuery('.datepicker-autoclose').datepicker({
            format: " yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true,
        });
</script>
@endpush
