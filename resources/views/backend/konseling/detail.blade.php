<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form class="formreset" id="formreset" action="" method="POST">
            {{ method_field('put') }}
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Detail Pelanggaran - Bimbingan Konseling</h6>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="{{$kons->id}}">
                <p style="text-align:center;"><b>Tahun Akademik</b>: {{ $kons->periode->tahun_akademik}}, {{ $kons->periode->semester}} </p>
                <p style="text-align:center;"><b>Nama Siswa</b>: {{ $kons->siswa->nama_siswa}}, {{$kons->siswa->nis}}</p>
                <p style="text-align:center;"><b>Pelanggaran</b>: {{ $kons->pelanggaran->nama_pelanggaran}}, <b>Poin</b>: {{$kons->pelanggaran->poin_pelanggaran}}</p>
                <p style="text-align:center;"><b>Pelanggaran</b>:</b> {{ $kons->bimbingan_konseling}} | <b>{{ $kons->status }}</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->