@extends('layouts.master')
@section ('title', 'Data Siswa - Sistem Informasi Bimbingan Konseling')

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
                            <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
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
                        <h5 class="card-title">Data Siswa</h5>
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
                                                <th>NIS</th>
                                                <th>Kelas</th>
                                                <th>Nama</th>
                                                <th>Tempat/Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0 ;?>
                                            @foreach($siswas as $siswa)
                                            <?php $no++ ;?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $siswa->nis }}</td>
                                                <td>{{ $siswa->kelas->nama_kelas }} {{$siswa->kelas->nama_jurusan}}</td>
                                                <td>{{ $siswa->nama_siswa }}</td>
                                                <td>{{ $siswa->tempat_lahir }}, {{ $siswa->tanggal_lahir }}</td>
                                                <td>{{ $siswa->jenis_kelamin }}</td>
                                                <td>{{ $siswa->alamat }}</td>
                                                <td style="white-space: nowrap;">
                                                    <a onClick="modalEditTriger( {{ $siswa->nis }} )" class="btn btn-info btn-sm" style="color:white;">Ubah</a>
                                                    @if (Auth::user()->roles_id == 5)
                                                        <a onClick="modalEditTriger( {{ $siswa->nis }} )" class="btn btn-primary btn-sm" style="color:white;">Naik Kelas</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <h5 class="card-title">Data Orang Tua</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Orang Tua</th>
                                                <th>Nama Siswa</th>
                                                <th>Telephone</th>
                                                <th>Alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0 ;?>
                                            @foreach($siswas as $siswa)
                                            <?php $no++ ;?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $siswa->nama_ortu }}</td>
                                                <td>{{ $siswa->nama_siswa }}</td>
                                                <td>{{ $siswa->no_telp }}</td>
                                                <td>{{ $siswa->alamat_ortu }}</td>
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
    {{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif

		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $sukses }}</strong>
		</div>
		@endif
<!-- modal create -->
<div class="modal fade" id="myModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form class="formuser" id="formuser" action="/siswa/import_excel" method="POST" enctype="multipart/form-data">
        {{csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Siswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" class="form-control"/>
                    <div class="form-group">
                        <label for="username">Import Excel</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="validatedCustomFile" required="required">
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                            <div class="invalid-feedback">Example invalid custom file feedback</div>
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
@endsection
@push('scripts')
<script>
// MODAL EDIT

function modalEditTriger(nis){
    jQuery.noConflict();
    $.ajax({
        url     : "{{ route('editsiswa') }}",
        method  : 'get',
        data    : {
        'nis' : nis
        },
        success : function(response){
        // console.log(response);
            $('.modalKu').html(response);
            $('#editModal').modal({ backdrop: 'static', keyboard: false });
        }
    });
}

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<script>
    /****************************************
    *       Basic Table                   *
    ****************************************/
    $('#zero_config').DataTable();
    $('#zero_config2').DataTable();
</script>
@endpush
