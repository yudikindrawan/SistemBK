<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form class="formreset" id="formreset" action="{{ route('siswa.update', $siswas->nis) }}" method="POST">
            {{ method_field('put') }}
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Siswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" class="form-control"/>
                    <select required class="custom-select custom-select mb-3 required" name="id_kelas" class="id_kelas">
                    <option disabled>Select Kelas</option>
                        @foreach($kelass as $kat)
                        <option value="{{ $kat->id }}"
                            @if ($kat->id === $siswas->id_kelas)
                                selected
                            @endif
                            >{{ $kat->nama_kelas }}
                        </option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="{{ $siswas->nama_siswa }}" required/>
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{ $siswas->tempat_lahir }}" required/>
                    </div>
                    <div class="form-group m-t-20">
                        <label>Tanggal Lahir<small class="text-muted"></small></label>
                        <input type="text" class="form-control date-inputmask" name="tanggal_lahir" id="date-mask" value="{{ $siswas->tanggal_lahir}}">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                            @foreach(["L" => "Laki-Laki", "P" => "Perempuan"] AS $gender => $label)
                            <option value="{{ $gender }}" {{ old("jenis_kelamin", $siswas->jenis_kelamin) == $gender ? "selected" : "" }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $siswas->alamat }}" required/>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Nama Orang Tua</label>
                        <input type="text" name="nama_ortu" id="nama_ortu" class="form-control" value="{{ $siswas->nama_ortu }}" required/>
                    </div>
                    <div class="form-group">
                        <label>No Telephone Orang Tua</label>
                        <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ $siswas->no_telp }}" required/>
                    </div>
                    <div class="form-group">
                        <label>Alamat Orang Tua</label>
                        <input type="text" name="alamat_ortu" id="alamat_ortu" class="form-control" value="{{ $siswas->alamat_ortu }}" required/>
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
