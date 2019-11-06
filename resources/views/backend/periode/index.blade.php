@extends('layouts.master')
@section ('title', 'Data Periode- Sistem Informasi Bimbingan Konseling')

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
                            <li class="breadcrumb-item active" aria-current="page">Periode</li>
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
                        <h5 class="card-title">Data Periode</h5>
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
                                                <th>Semester</th>
                                                <th>Tahun AKademik</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0 ;?>
                                            @foreach($periodes as $periode)
                                            <?php $no++ ;?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $periode->semester }}</td>
                                                <td>{{ $periode->tahun_akademik }}</td>
                                                <td style="white-space: nowrap; ">
                                                    <a onClick="modalEditTriger( {{$periode->id}} )" data-toggle="modal" class="btn btn-info btn-sm" style="color:white;">Ubah</a>
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
        <form class="formuser" id="formuser" action="{{ route('periode.store') }}" method="POST">
        {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Periode</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" class="form-control"/>
                    <div class="form-group">
                        <label>Semester</label>
                        <select required class="select2 form-control custom-select" style="width: 100%; height:36px;" name="semester">
                            <option selected disabled>Pilh Semester</option>
                            @foreach(["Ganjil" => "Ganjil", "Genap" => "Genap"] AS $semester => $label)
                            <option value="{{$semester}}" >{{$label}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="m-t-15">Tahun Akademik</label>
                        <div class="input-group">
                            <input type="text" name="tahun_akademik" class="form-control datepicker-autoclose" id="datepicker-autoclose" placeholder="yyyy" required>
                            <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
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
            url     : "{{ route('editperiode') }}",
            method  : 'get',
            data    : {
            'id' : id
            },
            success : function(response){
            // console.log(response);
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
