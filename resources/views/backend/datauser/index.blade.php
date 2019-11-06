@extends('layouts.master')
@section ('title', 'Data User - Sistem Informasi Bimbingan Konseling')

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
                            <li class="breadcrumb-item active" aria-current="page">Data User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data User</h5>
                        <div class="card">
                        <div class="col-xs-7">
                            <a href="javascript:void(0)"><button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">Tambah</button></a>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Roles</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0 ;?>
                                            @foreach($users as $user)
                                            <?php $no++ ;?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->roles->nama_role}}</td>
                                                <td style="white-space: nowrap; ">
                                                    <a onClick="modalEditTriger( {{$user->id}} )" data-toggle="modal" class="btn btn-warning btn-sm">Reset</a>
                                                    <button class="btn btn-danger btn-sm" data-id={{ $user->id }} data-toggle="modal" data-target="#exampleModal">Hapus</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- modal create -->
<div class="modal fade" id="myModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form class="formuser" id="formuser" action="{{route('user.store')}}" method="POST">
        {{csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" class="form-control"/>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control " placeholder="Masukan Username" required/>
                    </div>
                    <div class="form-group">
                        <label for="roles_id">Jabatan</label>
                        <select name="roles_id" id="roles_id" class="form-control select2 " style="width: 100%;" required>
                            <option selected="selected" value="">Pilih Jabatan</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->nama_role}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-success btn-sm" value="Simpan">
                </div>
            </div>    
        </form> 
    </div>
</div>
<!-- end modal create-->
<!-- modal delete -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('user.hapus')}}" method="post">
        {{ csrf_field() }}
        {{ method_field('delete') }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Peringatan Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id"/> 
                    Apa anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end modal delete -->
<div class="modalKu"></div>
@endsection
@push('scripts')
<script>
    // MODAL EDIT
    
    function modalEditTriger(id){
        jQuery.noConflict();
        $.ajax({
            url     : "{{ route('edituser') }}",
            method  : 'get',
            data    : {
            'id' : id
            },
            success : function(response){
            // console.log(response);
                $('.modalKu').html(response);
                $('#editModal').modal({ backdrop: 'static', keyboard: false });
            }
        });
    }

    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var recipient = button.data('id')
        var modal = $(this)
            modal.find('#id').val(recipient)
    })
</script>
<script>
    /****************************************
    *       Basic Table                   *
    ****************************************/
    $('#zero_config').DataTable();
</script>
@endpush
