@extends('layouts.master')
@section ('title', 'Dashboard - Sistem Informasi Bimbingan Konseling')
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
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
                    <!-- Column -->
            @if (Auth::user()->roles_id == 2)
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                        <a href="{{ route('konseling.index')}}"><h6 class="text-white">Konseling</h6></a>
                    </div>
                </div>
            </div>
                    <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                        <a href="{{ route('siswa.index')}}"><h6 class="text-white">Siswa</h6></a>
                    </div>
                </div>
            </div>
                    <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <div class="box bg-warning text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                        <a href="{{ route('pelanggaran.index')}}"><h6 class="text-white">Pelanggaran</h6></a>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                        <a href="#"></a><h6 class="text-white">Laporan</h6>
                    </div>
                </div>
            </div>
            @elseif(Auth::user()->roles_id == 3)
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                        <a href="#"></a><h6 class="text-white">Laporan</h6>
                    </div>
                </div>
            </div>
            @else
            @endif
        </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Site Analysis</h4>
                            <h5 class="card-subtitle">Overview of Latest Month</h5>
                        </div>
                    </div>
                    <div class="row">
                    <!-- column -->
                        <div class="col-lg-9">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart"></div>
                            </div>
                        </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-6">
                                <div class="bg-dark p-10 text-white text-center">
                                    <i class="fa fa-user m-b-5 font-16"></i>
                                        <h5 class="m-b-0 m-t-5">{{$users->count()}}</h5>
                                        <small class="font-light">Total Users</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-dark p-10 text-white text-center">
                                    <i class="fa fa-plus m-b-5 font-16"></i>
                                        <h5 class="m-b-0 m-t-5">{{$siswas->count()}}</h5>
                                        <small class="font-light">Total Siswa</small>
                                </div>
                            </div>
                            <div class="col-6 m-t-15">
                                <div class="bg-dark p-10 text-white text-center">
                                    <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                        <h5 class="m-b-0 m-t-5">{{$kons->count()}}</h5>
                                        <small class="font-light">Total Bimbingan</small>
                                </div>
                            </div>
                            <div class="col-6 m-t-15">
                                <div class="bg-dark p-10 text-white text-center">
                                    <i class="fa fa-tag m-b-5 font-16"></i>
                                        <h5 class="m-b-0 m-t-5">{{$pels->count()}}</h5>
                                        <small class="font-light">Total Pelanggaran</small>
                                </div>
                            </div>
                            <div class="col-6 m-t-15">
                                <div class="bg-dark p-10 text-white text-center">
                                    <i class="fa fa-table m-b-5 font-16"></i>
                                        <h5 class="m-b-0 m-t-5">100</h5>
                                        <small class="font-light">Pending Orders</small>
                                </div>
                            </div>
                            <div class="col-6 m-t-15">
                                <div class="bg-dark p-10 text-white text-center">
                                    <i class="fa fa-globe m-b-5 font-16"></i>
                                        <h5 class="m-b-0 m-t-5">8540</h5>
                                        <small class="font-light">Online Orders</small>
                                </div>
                            </div>
                        </div>
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