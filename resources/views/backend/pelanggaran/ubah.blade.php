<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form class="formreset" id="formreset" action="{{ route('pelanggaran.update', $pelanggarans->id) }}" method="POST">
            {{ method_field('put') }}
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Pelanggaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="{{$pelanggarans->id}}" class="form-control"/>
                    <div class="form-group">
                        <label>Nama Pelanggaran</label>
                        <input type="text" name="nama_pelanggaran" id="nama_pelanggaran" class="form-control " placeholder="Masukan Nama Pelanggaran" value="{{ $pelanggarans->nama_pelanggaran }}" required/>
                    </div>
                    <div class="form-group">
                        <label>Poin Pelanggaran</label>
                        <input type="text" name="poin_pelanggaran" id="poin_pelanggaran" class="form-control " placeholder="Masukan Poin Pelanggaran" value="{{ $pelanggarans->poin_pelanggaran }}" required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-success btn-sm" value="Simpan">
                </div>
            </div>
        </form>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
