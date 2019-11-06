@extends('layouts.master')
@section ('title', 'Dashboard - Sistem Informasi Bimbingan Konseling')
@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
          @if(Auth::user()->roles_id == 2 && Auth::user()->roles_id == 3)
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
          @endif
        </div>
    </div>
    <div class="container-fluid">
    <div class="row">
        <!-- Column -->
        {{-- @if (Auth::user()->roles_id == 1)
          <div class="col-md-6 col-lg-3">
              <div class="card card-hover">
                  <div class="box bg-cyan text-center">
                      <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                      <a href="{{ route('user.index')}}"><h6 class="text-white">Data User</h6></a>
                  </div>
              </div>
          </div>
        @endif --}}
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
                        <a href="{{ route('laporan_konseling')}}"><h6 class="text-white">Laporan</h6></a>
                    </div>
                </div>
            </div>
        @elseif(Auth::user()->roles_id == 3)
            <!-- Column -->
            {{-- <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                        <a href="{{ route('konseling.index')}}"><h6 class="text-white">Konseling</h6></a>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                        <a href="{{ route('laporan_konseling')}}"><h6 class="text-white">Laporan</h6></a>
                    </div>
                </div>
            </div>
        @else
        @endif
    </div>
    @if(Auth::user()->roles_id == 2 )
    <div class="col-lg-12">
        <div class="row">
            <div class="col-3">
                <div class="bg-dark p-10 text-white text-center">
                    <i class="fa fa-user m-b-5 font-16"></i>
                        <h5 class="m-b-0 m-t-5">{{$users->count()}}</h5>
                        <small class="font-light">Total Users</small>
                </div>
            </div>
            <div class="col-3">
                <div class="bg-dark p-10 text-white text-center">
                    <i class="fa fa-plus m-b-5 font-16"></i>
                        <h5 class="m-b-0 m-t-5">{{$siswas->count()}}</h5>
                        <small class="font-light">Total Siswa</small>
                </div>
            </div>
            <div class="col-3">
                <div class="bg-dark p-10 text-white text-center">
                    <i class="fa fa-cart-plus m-b-5 font-16"></i>
                        <h5 class="m-b-0 m-t-5">{{$kons->count()}}</h5>
                        <small class="font-light">Total Bimbingan</small>
                </div>
            </div>
            <div class="col-3">
                <div class="bg-dark p-10 text-white text-center">
                    <i class="fa fa-tag m-b-5 font-16"></i>
                        <h5 class="m-b-0 m-t-5">{{$pels->count()}}</h5>
                        <small class="font-light">Total Pelanggaran</small>
                </div>
            </div>
        </div>
    </div>
    @endif
    <br>
    <div class="row">
        @if(Auth::user()->roles_id != 4 && Auth::user()->roles_id != 1 )
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Grafik Pelanggaran</h4>
                        </div>
                    </div>
                    <div class="row">
                    <!-- column -->
                        <!-- <div class="col-lg-6">
                            <div class="form-group">
                                <label>Date range:</label>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control pull-right input_konseling" id="laporan_konseling" name="lap_konseling">
                                </div>
                            </div>
                        </div> -->

                            <canvas id="myChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(Auth::user()->roles_id != 2 && Auth::user()->roles_id != 3)
          <div class="col-lg-12">
              <img class="mx-auto d-block" src="{{ asset ('assets/images/ppgri.png')}}" class="img-fluid" width="400" height="400" >
              {{-- <p  class="text-right"><h2>S.I Bimbinga Konseling</h2></p> --}}
          </div>
        @endif
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">

var url = "{{route('chart-bar')}}";
var Years = [];
var Labels = [];
var Prices = [];

    $(document).ready(function(){
        $.get(url, function(response){
            response.forEach(function(data){
                Years.push(data.nama_pelanggaran);
                Prices.push(data.tampil);
            });
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: Years,
                datasets: [{
                    label: 'Pelanggaran',
                    data: Prices,
                    borderColor: "#80b6f4",
                    pointBorderColor: "#80b6f4",
                    pointBackgroundColor: "#80b6f4",
                    pointHoverBackgroundColor: "#80b6f4",
                    pointHoverBorderColor: "#80b6f4",
                    pointBorderWidth: 10,
                    pointHoverRadius: 10,
                    pointHoverBorderWidth: 1,
                    pointRadius: 1,
                    fill: false,
                    borderWidth: 2
                }]
            },

            // Configuration options go here
            options: {
              responsive: true,
              maintainAspectRatio: false,
              legend: { display: true },
              scales: {
                 yAxes: [{
                     ticks: {
                         beginAtZero: true,
                         userCallback: function(label, index, labels) {
                             // when the floored value is the same as the value we have a whole number
                             if (Math.floor(label) === label) {
                                 return label;
                             }
                         },
                     }
                 }],
              },
            }
            });
        });
    });
</script>
@endpush
