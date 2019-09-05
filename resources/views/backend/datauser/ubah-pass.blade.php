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
                            <li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
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
                        <div class="card-body">
                            <form class="formsiswa" id="formsiswa" action="{{ route('changePassword') }}" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Ubah Password</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" class="form-control"/>
                                        <div class="form-group">
                                            <label for="currentpassword">Password Lama</label>
                                            <input type="password" name="currentpassword" id="currentpassword" class="form-control" placeholder="Masukan Password Lama" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="newpassword">Password Baru</label>
                                            <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="Masukan Password Baru" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="newpasswordconfirm">Konfirmasi Password Baru</label>
                                            <input type="password" name="newpasswordconfirm" id="newpasswordconfirm" class="form-control" placeholder="Masukan Konfirmasi Password Baru" required/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-primary" value="Simpan">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush

