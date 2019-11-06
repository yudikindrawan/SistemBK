<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelanggaran;
Use Alert;
use Auth;

class pelanggarancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
         $this->middleware('auth');
         $this->middleware('roles:BK');
     }
    public function index()
    {
        //
        $pelanggarans = pelanggaran::all();
        return view('backend/pelanggaran/index', compact('pelanggarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pelanggarans = pelanggaran::all();
        return view('backend/pelanggaran/index', compact('pelanggarans'));
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
        $pelanggarans = new pelanggaran;
        $pelanggarans->nama_pelanggaran = $request->nama_pelanggaran;
        $pelanggarans->poin_pelanggaran = $request->poin_pelanggaran;
        $pelanggarans->save();
          toastr()->success('Data berhasih disimpan', 'Pesan berhasil');
          return redirect('pelanggaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }
    public function ubah(Request $request){
      $pelanggarans = pelanggaran::findOrFail($request->id);
      // dd($pelanggarans);
      return view('backend/pelanggaran/ubah', compact('pelanggarans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $pelanggarans = pelanggaran::findOrFail($request->id);
        $pelanggarans->nama_pelanggaran = $request->nama_pelanggaran;
        $pelanggarans->poin_pelanggaran = $request->poin_pelanggaran;
        $pelanggarans->save();
          toastr()->success('Data berhasih disimpan', 'Pesan berhasil');
          return redirect('pelanggaran');
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
}
