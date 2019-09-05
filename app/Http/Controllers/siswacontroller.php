<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\siswa;
use App\user;
use App\roles;
use App\kelas;
use Session;
Use Alert;
use Auth;
use App\Imports\SiswaImport;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;

class siswacontroller extends Controller
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
        $siswas = siswa::all();
        $kelass = kelas::all();
        return view('backend/siswa/index', compact('siswas','kelass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import_excel(Request $request)
    {
      // validasi
        $this->validate([
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);

        $file = $request->file('file');
        $filename = rand().$file->getClientOriginalName();
        $file->move('file_upload', $filename);
        Excel::import(new SiswaImport, public_path('/file_upload/'. $filename));
        Excel::import(new UserImport, public_path('/file_upload/'. $filename));
        Session::flash('sukses','Data Siswa Berhasil Diimport!');
        
        return redirect('siswa');
    }
    public function create()
    {
        //
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
        $siswas = siswa::find($request->nis);
        $kelass = kelas::all();
        return view('backend/siswa/ubah', compact('siswas','kelass'));
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
        $siswas = siswa::find($id);
        $siswas->id_kelas = $request->id_kelas;
        $siswas->nama_siswa = $request->nama_siswa;
        $siswas->tempat_lahir = $request->tempat_lahir;
        $siswas->tanggal_lahir = $request->tanggal_lahir;
        $siswas->jenis_kelamin = $request->jenis_kelamin;
        $siswas->alamat = $request->alamat;
        $siswas->nama_ortu = $request->nama_ortu;
        $siswas->no_telp = $request->no_telp;
        $siswas->alamat_ortu = $request->alamat_ortu;
        $siswas->save();
            toastr()->success('Data berhasih disimpan', 'Pesan berhasil');
            return redirect('siswa');
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
