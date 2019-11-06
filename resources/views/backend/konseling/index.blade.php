@extends('layouts.master')
@section ('title', 'Data Bimbingan Konseling - Sistem Informasi Bimbingan Konseling')

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
                        <h5 class="card-title">Data Bimbingan Konseling</h5>
                        <div class="card">
                        <div class="col-xs-7">
                        @if(Auth::user()->roles_id == 2)
                            <a href="{{ route('konseling.create') }}"><button type="button" class="btn btn-success btn-md">Tambah</button></a>
                        @endif
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun Akademik</th>
                                                <th>Tanggal</th>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Poin</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 0 @endphp
                                            @foreach($kons as $kon)
                                            @php $no++ @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $kon->periode->tahun_akademik }}</td>
                                                <td>{{ $kon->created_at}}</td>
                                                <td>{{ $kon->siswa->nis}}</td>
                                                <td>{{ $kon->nama_siswa }}</td>
                                                <td>{{ $kon->total_poin}}</td>
                                                {{-- @if($kon->status == "Pending")
                                                    <td><span class="badge badge-warning">{{ $kon->status}}</span></td>
                                                @else
                                                    <td><span class="badge badge-success">{{ $kon->status}}</span></td>
                                                @endif --}}
                                                <td style="white-space: nowrap; ">
                                                @if(Auth::user()->roles_id == 2)
                                                    <a href="{{ route('konseling.edit', $kon->id) }}" class="btn btn-info btn-sm" style="color:white;">Ubah</a>
                                                    <a onClick="modalEditTriger( {{$kon->id}} )" data-toggle="modal"  class="btn btn-primary btn-sm" style="color:white;">Detail</a>
                                                {{-- @elseif(Auth::user()->roles_id == 3)
                                                    <a data-toggle="modal" data-target="#paidAlert" data-id="{{$kon->id}}" class="btn btn-success btn-sm" style="color:white;">Validasi</a> --}}
                                                @endif
                                                @if ($kon->status == "Valid" && Auth::user()->roles_id == 2)
                                                    <a data-toggle="modal" onClick="modalEditReport( {{$kon->id}} )" class="btn btn-warning btn-sm" style="color:white;"><i class="mdi mdi-cloud-download"></i></a>
                                                @endif
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
<!-- Modal Validasi -->
<div id="paidAlert" class="modal modal-adminpro-general Customwidth-popup-WarningModal fade" role="dialog">
    <div class="modal-dialog">
        <form id="paidForm" class="" action="{{route('konseling.valid')}}" method="post">
            @csrf
            {{method_field('put')}}
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <div class="modal-header">
                    <h4>Perhatian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="adminpro-icon adminpro-warning-danger modal-check-pro information-icon-pro"></span>
                    <p>Yakin ingin validasi ?</p>
                    <input type="hidden" name="id" id="id" value="">
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary btn-sm" data-dismiss="modal" href="#">Batal</a>
                    <a class="btn btn-success btn-sm" href="#" onclick="document.getElementById('paidForm').submit();">Yakin</a>
                </div>
            </div>
        </form>
    </div>
</div>
    <div class="modalKu"></div>
@endsection
@push('scripts')
<script>
   // MODAL EDIT

    function modalEditTriger(id){
        jQuery.noConflict();
        $.ajax({
            url     : "{{ route('detailkonseling') }}",
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
</script>
<script>
    function modalEditReport(id){
        jQuery.noConflict();
        $.ajax({
            url     : "{{ route('indexreport') }}",
            method  : 'get',
            data    : {
            'id' : id
            },
            success : function(response){
            // console.log(response);
                $('.modalKu').html(response);
                $('#modalSP').modal({ backdrop: 'static', keyboard: false });
            }
        });
    }


    $('#paidAlert').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')

        var modal = $(this)
        modal.find('#id').val(id)
    })

    $('#modalSP').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')

        var modal = $(this)
        modal.find('#id').val(id)
    })

</script>
<script>
    /****************************************
    *       Basic Table                   *
    ****************************************/
    $('#zero_config').DataTable();

</script>
@endpush
