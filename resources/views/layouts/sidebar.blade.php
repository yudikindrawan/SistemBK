        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                @if (Auth::user()->roles_id == 1)
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('user.index')}}" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Data User</span></a></li>
                    <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('guru.index')}}" aria-expanded="false"><i class="mdi mdi-multiplication-box"></i><span class="hide-menu">Data Guru</span></a></li> -->
                @elseif (Auth::user()->roles_id == 4)
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                    <li class="sidebar-item"><a href="{{ route('show_Peringatan') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Surat Pemanggilan Orang Tua</span></a></li>
                    <li class="sidebar-item"><a href="{{ route('show_Pengembalian') }}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Surat Pengembalian Siswa </span></a></li>
                @elseif (Auth::user()->roles_id == 3)
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                    {{-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('konseling.index') }}" aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span class="hide-menu">Data Bimbingan Konseling</span></a></li> --}}
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-move-resize-variant"></i><span class="hide-menu">Laporan </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="{{ route('laporan_konseling')}}" class="sidebar-link"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Laporan Bimbingan Konseling</span></a></li>
                        </ul>
                    </li>
                @elseif(Auth::user()->roles_id == 5)
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('guru.index')}}" aria-expanded="false"><i class="mdi mdi-multiplication-box"></i><span class="hide-menu">Data Guru</span></a></li>
                @else
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Data Master </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="{{ route('siswa.index') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Data Siswa </span></a></li>
                            <li class="sidebar-item"><a href="{{ route('kelas.index') }}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Data Kelas </span></a></li>
                            <li class="sidebar-item"><a href="{{ route('periode.index') }}" class="sidebar-link"><i class="mdi mdi-calendar-multiple"></i><span class="hide-menu"> Data Periode </span></a></li>
                            <li class="sidebar-item"><a href="{{ route('pelanggaran.index') }}" class="sidebar-link"><i class="mdi mdi-pencil"></i><span class="hide-menu"> Data Pelanggaran </span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('konseling.index') }}" aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span class="hide-menu">Data Bimbingan Konseling</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-move-resize-variant"></i><span class="hide-menu">Laporan </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="{{ route('laporan_konseling')}}" class="sidebar-link"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Laporan Bimbingan Konseling</span></a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
