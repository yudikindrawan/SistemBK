<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form class="formreset" id="formreset" action="{{route('periode.update', $periodes->id)}}" method="POST">
            {{ method_field('put') }}
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Periode</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" class="form-control"/>
                    <div class="form-group">
                        <label>Semester</label>
                        <select required class="select2 form-control custom-select" style="width: 100%; height:36px;" name="semester" required>
                            <option selected="selected">Pilh Semester</option>
                            @foreach($semesters as $semester)
                            <option value="{{$semester}}" >{{$semester}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="m-t-15">Tahun Akademik</label>
                        <div class="input-group">
                            <input type="text" name="tahun_akademik" class="form-control datepicker-autoclose" id="datepicker-autoclose" value="{{ $periodes->tahun_akademik}}" required> 
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
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
