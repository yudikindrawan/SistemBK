<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelas;
Use Alert;
use Auth;

class kelascontroller extends Controller
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
        $kelass = kelas::all();
        return view('backend/kelas/index', compact('kelass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kelass = kelas::all();
        return view('backend/kelas/index', compact('kelass'));
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
        $kelas = new kelas;
        $kelas->nama_kelas = $request->kelas;
        $kelas->nama_jurusan = $request->jurusan;
        $kelas->save();
        toastr()->success('Data berhasih disimpan', 'Pesan berhasil');
        return redirect('kelas');
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

    public function ubah(Request $request)
    {
        //
        $kelass = kelas::find($request->id);
        return view('backend/kelas/ubah', compact('kelass'));
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
        $kelas = kelas::findOrFail($id);
        $kelas->nama_kelas = $request->kelas;
        $kelas->nama_jurusan = $request->jurusan;
        $kelas->save();
        toastr()->success('Data berhasih disimpan', 'Pesan berhasil');
        return redirect('kelas');
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
