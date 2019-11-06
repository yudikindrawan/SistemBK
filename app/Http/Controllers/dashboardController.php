<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\roles;
use App\siswa;
use App\pelanggaran;
use App\konseling;
use Auth;
use DB;
use PDF;


class dashboardController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $siswas = siswa::all();
        $pels = pelanggaran::all();
        $kons = konseling::all();
        $users = user::all();
        return view ('backend/dashboard', compact('siswas','users','pels','kons'));
    }
    public function profil(){
        $users = user::all();
        $roles = roles::all();
        return view('backend/profile/index', compact('users','roles'));
    }
    public function report(){
        return view ('backend/konseling/report');
    }
    public function chart(Request $request){
      $result = DB::table('konselings')
      ->join('pelanggaran', 'konselings.id_pelanggaran', '=', 'pelanggaran.id')
      ->select(DB::raw('count(id_pelanggaran) as tampil'),'nama_pelanggaran')
      ->groupBy('pelanggaran.nama_pelanggaran')
      ->get();

      return response()->json($result);
    }
    public function showIndex(Request $req){
      return view('backend/surat/index', compact('kon'));
    }
    public function cariSiswa(Request $req){
      $cari = DB::table('konselings')->select('id_siswa', DB::raw('count(*) as total'))->where('id', $req->id)->groupBy('id_siswa')->first();

      return response()->json($cari);
    }
    public function showPeringatanOrtu(){
      $kons = konseling::where('id_siswa', '=', Auth::user()->username)->get();
      return view('backend/surat/index', compact('kons'));
    }

    public function showPengembalianOrtu(){
      $kons = konseling::where('id_siswa', '=', Auth::user()->username)->get();
      return view('backend/surat/indexpengembalian', compact('kons'));
    }
    public function cetak_pdf(Request $req){
      $data = DB::table('konselings')
      ->join('periode','konselings.id_periode', '=', 'periode.id')
      ->join('pelanggaran','konselings.id_pelanggaran', '=', 'pelanggaran.id')
      ->select('konselings.*','periode.tahun_akademik','pelanggaran.nama_pelanggaran')
      ->where('id_siswa','=', Auth::user()->username)
      ->orderBy('id_siswa','desc')
      ->get();

      $pdf = PDF::loadview('backend/surat/suratOrtu', compact('data'));
      return $pdf->download('surat-peringatan.pdf');
    }
    public function cetak_pdf_pengembalian(Request $req){

      $data = DB::table('konselings')
      ->join('periode','konselings.id_periode', '=', 'periode.id')
      ->join('pelanggaran','konselings.id_pelanggaran', '=', 'pelanggaran.id')
      ->select('konselings.*','periode.tahun_akademik','pelanggaran.nama_pelanggaran')
      ->where('id_siswa','=', Auth::user()->username)
      ->orderBy('id_siswa','desc')
      ->get();

      $pdf = PDF::loadview('backend/surat/suratpengembalian', compact('data'));
      return $pdf->download('surat-pengembalian.pdf');
    }
    public function showData(Request $req){
      if ($req->ajax()) {
        // code...
        $output = '';
        $query = $req->get('query');
        if ($query != '') {
          // code...
          $data = DB::table('konselings')
          ->where('id_siswa', 'like', '%'.$query.'%')
          ->orderBy('id','desc')
          ->get();
        }else {
          // code...
          $data = DB::table('konselings')
          ->orderBy('id','desc')
          ->get();
        }
        $total_row = $data->count();
          if ($total_row > 0) {
            // code...
            foreach ($data as $row) {
              // code...
              $output .= '
                <tr>
                  <td>'.$row->created_at.'</td>
                  <td>'.$row->id_siswa.'</td>
                  <td>'.$row->nama_siswa.'</td>
                  <td>'.$row->total_poin.'</td>
                  <td>'.$row->bimbingan_konseling.'</td>
                </tr>
              ';
            }
          }else {
            // code...
            $output ='
              <tr>
                <td align="center" colspan="5">Data Kosong</td>
              </tr>
            ';
          }
          $data = array(
            'table_data' => $output,
            'total_data' => $total_row
          );
          echo json_encode($data);
      }

      }
      public function pengembalianData(Request $req){
        if ($req->ajax()) {
          // code...
          $output = '';
          $query = $req->get('query');
          if ($query != '') {
            // code...
            $data = DB::table('konselings')
            ->where('id_siswa', 'like', '%'.$query.'%')
            ->orderBy('id','desc')
            ->get();
          }else {
            // code...
            $data = DB::table('konselings')
            ->orderBy('id','desc')
            ->get();
          }
          $total_row = $data->count();
            if ($total_row > 0) {
              // code...
              foreach ($data as $row) {
                // code...
                $output .= '
                  <tr>
                    <td>'.$row->created_at.'</td>
                    <td>'.$row->id_siswa.'</td>
                    <td>'.$row->nama_siswa.'</td>
                    <td>'.$row->total_poin.'</td>
                    <td>'.$row->bimbingan_konseling.'</td>
                  </tr>
                ';
              }
            }else {
              // code...
              $output ='
                <tr>
                  <td align="center" colspan="5">Data Kosong</td>
                </tr>
              ';
            }
            $data = array(
              'table_data' => $output,
              'total_data' => $total_row
            );
            echo json_encode($data);
        }



      }






}
