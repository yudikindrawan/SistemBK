<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelanggaran;
use App\periode;
use App\siswa;
use App\konseling;
use App\kelas;
use App\User;
Use Alert;
use Auth;
use DB;

use PDF;

class konselingcontroller extends Controller
{
    public function index()
    {
        //
        $kons = konseling::all();
        $pels = pelanggaran::all();
        $periodes = periode::all();
        $siswas = siswa::all();
        $kelas = kelas::all();
        return view('backend/konseling/index', compact('kons','pels','periodes','siswas'));
    }

    public function create()
    {
        //
        $kons = konseling::all();
        $pels = pelanggaran::all();
        $periodes = periode::all();
        $siswas = siswa::all();
        return view('backend/konseling/tambah', compact('kons','pels','periodes','siswas'));
    }

    public function store(Request $request)
    {
        $kons = konseling::updateOrCreate([
            'id_periode' => $request->tahun_akademik,
            'id_periode' => $request->semester,
            'id_pelanggaran' => $request->pelanggaran,
            'id_siswa' => $request->nis,
            'status' => 'Pending',
            'nama_siswa' => $request->nama_siswa,
            'total_poin' => $request->poin_pelanggaran,
            'bimbingan_konseling' => $request->bimbingan_konseling,
            'tanggal_pemanggilan' => $request->tanggal_pemanggilan,
        ]);

        toastr()->success('Data berhasil disimpan', 'Pesan berhasil');
        return redirect('konseling');
    }

    public function show(Request $request)
    {
        //
        $kons = konseling::find($request->id);
        $pels = pelanggaran::all();
        $periodes = periode::all();
        $siswas = siswa::all();
        return view('backend/konseling/detail', compact('kons','pels','periodes','siswas'));
    }

    public function indexReport(Request $request)
    {
        //
        $kons = konseling::find($request->id);
        $pels = pelanggaran::all();
        $periodes = periode::all();
        $siswas = siswa::all();
        return view('backend/konseling/addReport', compact('kons','pels','periodes','siswas'));
    }

    public function edit($id)
    {
        //
        $kons = konseling::find($id);
        $pels = pelanggaran::all();
        $periodes = periode::all();
        $siswas = siswa::all();
        return view('backend/konseling/ubah', compact('kons','pels','periodes','siswas'));
    }

    public function update(Request $request, $id)
    {
        //
        $kons = konseling::find($id);
        $kons->id_periode           = $request->tahun_akademik;
        $kons->id_periode           = $request->semester;
        $kons->id_pelanggaran       = $request->pelanggaran;
        $kons->id_siswa             = $request->nis;
        $kons->nama_siswa           = $request->nama_siswa;
        $kons->total_poin           = $request->poin_pelanggaran;
        $kons->bimbingan_konseling  = $request->bimbingan_konseling;
        $kons->save();
            toastr()->success('Data berhasil disimpan', 'Pesan berhasil');
            return redirect('konseling');
    }

    public function destroy($id)
    {
        //
    }
    public function cari(Request $request)
    {
        $p=siswa::select('nis')->where('nama_siswa', $request->nama_siswa)->first();

        return Response()->json($p);
    }

    public function cariPel(Request $request)
    {
        $p=pelanggaran::select('poin_pelanggaran')->where('id', $request->id)->first();

        return Response()->json($p);
    }

    public function valid(Request $req){
        $id = $req->id;
        $kons = konseling::findOrFail($id);
        $kons->status = 'valid';
        $kons->save();
            toastr()->success('Data berhasil divalidasi', 'Pesan berhasil');
            return redirect()->back();
    }

    public function indexsurat(){

        // $konseling = User::findOrFail(Auth::user()->id)->konseling;
        // $konseling = konseling::select('konselings.*')->get();
        $kons = konseling::all();
        // dd($konseling);
        return view('backend/surat/SP-ortu', compact('kons'));
    }

    public function sendSP(Request $req)
    {
        $id = $req->id;
        $kons = konseling::findOrFail($id);
        $kons->status_surat = '1';
        $kons->save();
        toastr()->success('Surat berhasil dibuat', 'Pesan Berhasil');
        return redirect()->back();
    }

    public function cetak_pdf($id){
        $konselings = konseling::find($id);
        $periode = periode::all();
        $pelanggaran = pelanggaran::all();
        $siswa = siswa::all();
        $pdf = PDF::loadview('backend/surat/suratOrtu', compact('konselings','periode','pelanggaran','siswa'));
        return $pdf->download('surat-peringata.pdf');
    }
}
