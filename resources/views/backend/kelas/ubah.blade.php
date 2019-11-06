<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form class="formreset" id="formreset" action="{{route('kelas.update', $kelass->id)}}" method="POST">
            {{ method_field('put') }}
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="m-t-15">Kelas</label>
                        <div class="input-group">
                            <input type="text" name="kelas" class="form-control " id="kelas" value="{{ $kelass->nama_kelas}}" required>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="m-t-15">Jurusan</label>
                        <div class="input-group">
                            <input type="text" name="jurusan" class="form-control " id="kelas" value="{{ $kelass->nama_jurusan}}" required>
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
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
