<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form class="formreset" id="formreset" action="{{route('user.update', $users->id)}}" method="POST">
            {{ method_field('put') }}
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reset Data User</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="{{$users->id}}">
                <input type="hidden" name="username" id="username"  class="form-control" value="{{$users->username}}"/>
                <input type="hidden" name="password" id="password"  class="form-control" value="{{$users->password}}"/>
                <p style="text-align:center;">Apakah anda yakin ingin mereset password?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-success" value="Yakin">
            </div>
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
