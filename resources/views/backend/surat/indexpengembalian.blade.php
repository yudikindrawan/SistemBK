@extends('layouts.master')
@section ('title', 'Data Kelas- Sistem Informasi Bimbingan Konseling')

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
                            <li class="breadcrumb-item active" aria-current="page">Surat Pengembalian</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
              {{-- <form class="formkonseling" id="formkonseling" action="{{ route('konseling.store') }}" method="POST">
                <div class="form-group">
                  <input type="text" name="search" id="search" class="form-control" placeholder="Cari Data Siswa" />
                </div>
              </form> --}}
              @if ($kons->sum('total_poin') >= 80 && $kons->sum('total_poin') <= 100 )
                  <button type="button" id="print" class="btn btn-warning btn-sm" style="color:white;"><i class="mdi mdi-cloud-download"> Cetak Surat</i></button>
              @endif
              <br><br>
              <div class="table-responsive">
                  <table id="zero_config" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>Tanggal</th>
                              <th>NIS</th>
                              <th>Nama</th>
                              <th>Poin</th>
                              <th>Permasalahan</th>
                          </tr>
                      </thead>
                      <tbody>
                        @if ($kons->sum('total_poin') < 50)
                          <tr>
                            <td colspan="5" align="center">Data Kosong</td>
                          </tr>
                        @elseif ($kons->sum('total_poin') >= 80 && $kons->sum('total_poin') <= 100 )
                          @foreach ($kons as $key => $value)
                            <tr>
                              <td>{{$value->created_at}}</td>
                              <td>{{$value->id_siswa}}</td>
                              <td>{{$value->nama_siswa}}</td>
                              <td>{{$value->total_poin}}</td>
                              <td>{{$value->bimbingan_konseling}}</td>
                            </tr>
                          @endforeach
                        @endif
                      </tbody>
                  </table>
              </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
  $(document).ready(function(){
    $(document).on('click', '#print', function(){
      var siswa = ($('#search').val());

      var link = "cetakPengembalian_pdf/"
      window.open(link);
    });
  });
</script> {{--
<script>
$(document).on('change','.cari', function () {
    var id=$(this).val();

    var a=$(this).parent();
    console.log(id);
    var op="";
    $.ajax({
        type:'get',
        url:"{{route('cariSiswa')}}",
        data:{'id':id},
        dataType:'json',//return data will be json
        success:function(data){
        console.log(data);

        // menampilkan value
        $('#poin_pelanggaran').val(data.poin_pelanggaran);
        },
        error:function(){

        }
    });
  });

  $('.cari').select2({
    placeholder: 'Cari...',
  });

</script> --}}
<script>
    /****************************************
    *       Basic Table                   *
    ****************************************/
    $('#zero_config').DataTable();

</script>
@endpush
