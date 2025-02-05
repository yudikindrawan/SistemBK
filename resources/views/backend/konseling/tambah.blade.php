@extends('layouts.master')
@section ('title', 'Data Bimbingan Konseling- Sistem Informasi Bimbingan Konseling')

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
                            <li class="breadcrumb-item active" aria-current="page">Bimbingan Konseling</li>
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
                    <div class="card">
                        <form class="formkonseling" id="formkonseling" action="{{ route('konseling.store') }}" method="POST">
                        {{ csrf_field() }}
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Bimbingan Konseling</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-right control-label col-form-label">Tahun Akademik</label>
                                        <select name="tahun_akademik" id="tahun_akademik" class="form-control select2 custom-select" style="width: 74%; height:36px;" required>
                                            <option selected="selected" disabled>Pilih Periode</option>
                                            @foreach($periodes as $periode)
                                                <option value="{{ $periode->id }}">{{ $periode->tahun_akademik }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-2 text-right control-label col-form-label">Semester</label>
                                        <select name="semester" id="semester" class="form-control select2 custom-select" style="width: 74%; height:36px;" required>
                                            <option selected="selected" disabled>Pilih Periode</option>
                                            @foreach($periodes as $periode)
                                                <option value="{{ $periode->id }}">{{ $periode->semester }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-right control-label col-form-label">Pelanggaran</label>
                                        <select name="pelanggaran" id="pelanggaran" class="form-control select2 custom-select pelanggaran" style="width: 74%; height:36px;" required>
                                            <option selected="selected" disabled>Pilih Pelanggaran</option>
                                            @foreach($pels as $pelanggaran)
                                                <option value="{{$pelanggaran->id}}">{{ $pelanggaran->nama_pelanggaran  }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama Siswa</label>
                                        <select name="nama_siswa" id="nama_siswa" class="form-control select2 custom-select siswa_nama" style="width: 74%; height:36px;" required>
                                            <option selected="selected" disabled>Pilih Siswa</option>
                                            @foreach($siswas as $sis)
                                                <option value="{{$sis->nama_siswa}}">{{ $sis->nama_siswa }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nis" class="col-sm-2 text-right control-label col-form-label">NIS</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="poin_pelanggaran" class="col-sm-2 text-right control-label col-form-label">Poin Pelanggaran</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="poin_pelanggaran" name="poin_pelanggaran" placeholder="Poin Pelanggaran" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bimbingan_konseling" class="col-sm-2 text-right control-label col-form-label">Bimbingan Konseling</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="bimbingan_konseling" name="bimbingan_konseling" placeholder="Masukkan bimbingan konseling">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bimbingan_konseling" class="col-sm-2 text-right control-label col-form-label">Tanggal Pemanggilan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control datepicker-autoclose" id="tanggal_pemanggilan" name="tanggal_pemanggilan" placeholder="dd/mm/yyyy" required >
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location='{{ route('konseling.index')}}'">Batal</button>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-primary" value="Simpan">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).on('change','.siswa_nama', function () {
        var id=$(this).val();

        var a=$(this).parent();
        console.log(id);
        var op="";
        $.ajax({
            type:'get',
            url:"{{route('cari')}}",
            data:{'nama_siswa':id},
            dataType:'json',//return data will be json
            success:function(data){
            console.log(data.nis);

            // menampilkan value
            $('#nis').val(data.nis);
            },
            error:function(){

            }
        });
    });

    $(document).on('change','.pelanggaran', function () {
        var id=$(this).val();

        var a=$(this).parent();
        console.log(id);
        var op="";
        $.ajax({
            type:'get',
            url:"{{route('cariPel')}}",
            data:{'id':id},
            dataType:'json',//return data will be json
            success:function(data){
            console.log(data.poin_pelanggaran);

            // menampilkan value
            $('#poin_pelanggaran').val(data.poin_pelanggaran);
            },
            error:function(){

            }
        });
      });
</script>
<script>
    $(".select2").select2();
    /****************************************
    *       Basic Table                   *
    ****************************************/
    $('#zero_config').DataTable();
</script>
<script>
    /*datwpicker*/
        jQuery('.datepicker-autoclose').datepicker({
            autoclose: true,
        });
</script>
@endpush
