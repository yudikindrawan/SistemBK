<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\periode;
Use Alert;
use Auth;

class periodecontroller extends Controller
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
        $periodes = periode::all();
        $semesters = ['Ganjil','Genap'];
        return view('backend/periode/index', compact('periodes','semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $periodes = periode::all();
        $semesters = ['Ganjil','Genap'];
        return view('backend/periode/index', compact('periodes','semesters'));
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
        $periodes = new periode;
        $periodes->semester = $request->semester;
        $periodes->tahun_akademik = $request->tahun_akademik;
        $periodes->save();
            toastr()->success('Data berhasih disimpan', 'Pesan berhasil');
            return redirect('periode');
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
    public function edit(Request $request)
    {
        //
    }
    public function ubah(Request $request)
    {
        //
        $periodes = periode::find($request->id);
        $semesters = ['Ganjil','Genap'];
        return view('backend/periode/ubah', compact('periodes','semesters'));
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
        $periodes = periode::find($id);
        $periodes->semester = $request->semester;
        $periodes->tahun_akademik = $request->tahun_akademik;
        $periodes->save();
            toastr()->success('Data berhasih disimpan', 'Pesan berhasil');
            return redirect('periode');
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
