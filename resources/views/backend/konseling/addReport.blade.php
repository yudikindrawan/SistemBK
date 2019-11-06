<div id="modalSP" class="modal modal-adminpro-general Customwidth-popup-WarningModal fade" role="dialog">
    <div class="modal-dialog">
        <form id="paidForm" class="" action="" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <div class="modal-header">
                    <h4>Surat Pemanggilan Orang Tua</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="{{$kons->id}}">
                    <div class="form-group">
                        <label class="m-t-15">Nama Siswa</label>
                        <div class="input-group">
                            <input type="text" name="nama" class="form-control " id="nama" value="{{ $kons->nama_siswa}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="m-t-15">NIS</label>
                        <div class="input-group">
                            <input type="text" name="nis" class="form-control " id="nis" value="{{ $kons->id_siswa}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="m-t-15">Total Poin</label>
                        <div class="input-group">
                            <input type="text" name="totalpoin" class="form-control " id="totalpoin" value="{{ $kons->total_poin}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="m-t-15">Kelas</label>
                        <div class="input-group">
                            <input type="text" name="nama" class="form-control " id="nama" value="{{ $kons->bimbingan_konseling}}" disabled>
                        </div>
                    </div>
                    <br><hr>
                    {{-- <input type="submit" class="btn btn-primary" value="Cetak Surat Peringatan"> --}}
                <a href="{{ route('sp-cetak', $kons->id)}}" class="btn btn-primary lg">CETAK</a>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </form>
    </div>
</div>
