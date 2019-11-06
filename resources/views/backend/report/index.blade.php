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
                            <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date range:</label>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control pull-right input_konseling" id="laporan_konseling" name="lap_konseling">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Tampilkan</label>
                            <div class="form-submit">
                                <a href="#" id="tampil"><button class="btn btn-primary">Tampilkan</button></a><input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card box_tampil">
            <div class="card-body">
                <button type="button" id="print" class="btn btn-success pull-right" data-dismiss="modal"><i class="mdi mdi-cloud-download"></i> Cetak</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <hr>
                <table id="dataTrans" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tahun Akademik</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Poin</th>
                            <th>Pelanggaran</th>
                        </tr>
                    </thead>
              </tbody>
                </table>
            </div>      <tbody>

        </div>
    </div>
@endsection
@push('scripts')
<script>
    // $('#zero_config').DataTable();
</script>
<script>
    $(document).ready(function(){
        var tb = {};
        $('#dataTrans').parents('div.table').first().hide();
    });

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
        });
</script>
<script>
    $(document).ready(function(){
    jQuery.noConflict();
    $('.input_konseling').daterangepicker({
        "startDate": "<?php echo date('d - m - Y'); ?>",
        "endDate": "<?php echo date('d - m - Y'); ?>",
        "opens": "right",
        "locale": {
            "format": "DD - MM - YYYY",
            "separator": " s/d ",
            "applyLabel": "Ok",
            "cancelLabel": "Batal",
            "fromLabel": "Dari",
            "toLabel": "Sampai",
            "customRangeLabel": "Custom",
            "daysOfWeek": [
                "Min",
                "Sen",
                "Sel",
                "Rab",
                "Kam",
                "Jum",
                "Sab"
            ],
            "monthNames": [
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember"
            ],
            "firstDay": 0
        }
    });

    tb = $('#dataTrans').DataTable({
        "ordering" : false,
        "searching" : false,
        "lengthChange" : false,
        "iDisplayLength" : 5,
        'paging'      : false,
        columns : [
        {data : 'TahunAkademik'},
        {data : 'NIS'},
        {data : 'Nama'},
        {data : 'Poin'},
        {data : 'Pelanggaran'}
        ]
    });
});

    $(document).on('click', '#tampil', function(){
    var tanggal = {
        'awal' : $('#laporan_konseling').data('daterangepicker').startDate.format('YYYY-MM-DD'),
        'akhir' : $('#laporan_konseling').data('daterangepicker').endDate.format('YYYY-MM-DD')
    };

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
        type: 'POST',
        url: '{{route('laporan_tampil')}}',
        data: tanggal,
        cache: false,
        success: function(response){
            console.log(response);
        $.each(response, function(i, item) {
            var datas = [{
            'TahunAkademik' : item.tahun_akademik,
            'NIS' :  item.id_siswa,
            'Nama' :  item.nama_siswa,
            'Poin' :  item.total_poin,
            'Pelanggaran' : item.nama_pelanggaran
            }];
            datas.forEach(function(data) {
            tb.row.add(data).draw();
            });
        });
        },
        error: function() {
        alert('A jQuery error has occurred. Status: ');
    }
    });
        $('#dataTrans').parents('div.table').first().show();
        $('.box_tampil').show();
        $('#dataTrans').dataTable().fnClearTable();
    });

$(document).on('click', '#print', function(){
    var awal = $('#laporan_konseling').data('daterangepicker').startDate.format('YYYY-MM-DD');
    var akhir = $('#laporan_konseling').data('daterangepicker').endDate.format('YYYY-MM-DD');

    var link = "print/"+awal+"/"+akhir;
    window.open(link);
});

</script>
@endpush
