<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\konseling;
use App\pelanggaran;
use App\siswa;
use App\periode;
use PDF;
use Response;
use View;

class laporankonselingController extends Controller
{
    //
    public function index(){
        return view('backend/report/index');
    }

    public function tampil_data(Request $request){

        $inp = $request->input('awal');
        $inpp = $request->input('akhir');

        $kon = DB::table('konselings')
            ->join('periode','konselings.id_periode', '=', 'periode.id')
            ->join('pelanggaran', 'konselings.id_pelanggaran', '=', 'pelanggaran.id')
            ->join('siswa', 'konselings.id_siswa', '=', 'siswa.nis')
            ->whereBetween('konselings.created_at',[$inp,$inpp])
            ->select('konselings.*','periode.tahun_akademik','periode.semester','pelanggaran.nama_pelanggaran','siswa.nama_siswa')
            ->get();
            // dd($konselings);
            // return Response($konselings);
        return Response::json($kon);
    }

    public function cetak(Konseling $konseling, $awal, $akhir){

        $kons = DB::table('konselings')
            ->join('periode','konselings.id_periode', '=', 'periode.id')
            ->join('pelanggaran', 'konselings.id_pelanggaran', '=', 'pelanggaran.id')
            ->join('siswa', 'konselings.id_siswa', '=', 'siswa.nis')
            ->whereBetween('konselings.created_at',[$awal,$akhir])
            ->select('konselings.*','periode.tahun_akademik','pelanggaran.nama_pelanggaran','pelanggaran.poin_pelanggaran','siswa.nama_siswa')
            ->get();

        $pdf = PDF::loadview('backend/report/laporankonseling', compact('kons','konseling', 'awal', 'akhir'));
        return $pdf->download('laporan-pelanggaran.pdf');
    }
}
