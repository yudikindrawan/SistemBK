@extends('layouts.master')
@section ('title', 'Profile - Sistem Informasi Bimbingan Konseling')

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
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                        <h4 class="card-title">Profil Pengguna</h4>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4">
                              <img src="{{ asset ('assets/images/users/new.jpg') }}" alt="John" style="width:70%">
                                <h1>John Doe</h1>
                                <p class="title">CEO & Founder, Example</p>
                                <p>Harvard University</p>
                                <div style="margin: 24px 0;">
                                  <a href="#"><i class="mdi-dribbble"></i></a>
                                  <a href="#"><i class="mdi-twitter"></i></a>
                                  <a href="#"><i class="mdi-linkedin"></i></a>
                                  <a href="#"><i class="mdi-facebook"></i></a>
                                </div>
                                <p><button class="btn btn-info btn-md">Contact</button></p>
                            </div>
                            <div class="col-md-8">
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                          </div>
                        </div>
                        <!-- <div class="card-footer">
                          <button class="col-md-12 btn btn-primary btn-lg">Perbaharui Informasi Profile</button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
