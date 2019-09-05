<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelanggaran;
use App\periode;
use App\siswa;
use App\konseling;
Use Alert;
use Auth;
use DB;

class konselingcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kons = konseling::all();
        $pels = pelanggaran::all();
        $periodes = periode::all();
        $siswas = siswa::all();
        return view('backend/konseling/index', compact('kons','pels','periodes','siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kons = konseling::all();
        $pels = pelanggaran::all();
        $periodes = periode::all();
        $siswas = siswa::all();
        return view('backend/konseling/tambah', compact('kons','pels','periodes','siswas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // if($kons->siswa->nis === 0){
        //     $kons = new konseling;
        //     $kons->id_periode           = $request->tahun_akademik;
        //     $kons->id_periode           = $request->semester;
        //     $kons->id_pelanggaran       = $request->pelanggaran;
        //     $kons->id_siswa             = $request->nis;
        //     $kons->status               = 'Pending';
        //     $kons->nama_siswa           = $request->nama_siswa;
        //     $kons->total_poin           = $request->poin_pelanggaran;
        //     $kons->bimbingan_konseling  = $request->bimbingan_konseling;
        // }else{
        //     $kons = konseling::find($request->id);
        //     $kons->id_periode           = $request->tahun_akademik;
        //     $kons->id_periode           = $request->semester;
        //     $kons->id_pelanggaran       = $request->pelanggaran;
        //     $kons->id_siswa             = $request->nis;
        //     $kons->status               = 'Pending';
        //     $kons->nama_siswa           = $request->nama_siswa;
        //     $kons->total_poin           = $request->poin_pelanggaran;
        //     $kons->bimbingan_konseling  = $request->bimbingan_konseling;
        // } 
        
        $kons = konseling::updateOrCreate(
            [
                'id_periode' => $request->tahun_akademik,
                'id_periode' => $request->semester,
                'id_pelanggaran' => $request->pelanggaran,
                'id_siswa' => $request->nis,
                'status' => 'Pending',
                'nama_siswa' => $request->nama_siswa,
                'total_poin' => $request->poin_pelanggaran,
                'bimbingan_konseling' => $request->bimbingan_konseling,
            ])->save();
        // $kons->save();
            toastr()->success('Data berhasil disimpan', 'Pesan berhasil');
            return redirect('konseling');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $kons = konseling::find($request->id);
        $pels = pelanggaran::all();
        $periodes = periode::all();
        $siswas = siswa::all();
        return view('backend/konseling/detail', compact('kons','pels','periodes','siswas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kons = konseling::find($id);
        $pels = pelanggaran::all();
        $periodes = periode::all();
        $siswas = siswa::all();
        return view('backend/konseling/ubah', compact('kons','pels','periodes','siswas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function cari(Request $request)
    {
        $p=siswa::select('nama_siswa')->where('nis', $request->nis)->first();

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
}
