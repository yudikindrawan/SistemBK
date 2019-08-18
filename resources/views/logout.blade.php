    <!-- MODAL LOGOUT -->
    <div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" style="top: 35%;">
            <form class="formsiswa" action="{{route('logout')}}" method="post">
                <div class="modal-content">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="">
                        <p style="text-align:center;">Apakah anda yakin ingin keluar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary">Yakin</button>
                    </div>
                </div>
            </form>
        </div>
    </div>