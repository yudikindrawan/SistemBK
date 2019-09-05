<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\roles;
Use Alert;
use Hash;
use Auth;
use DB;

class usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('roles:Admin');
    }

    public function index()
    {
        //
        $users = user::all();
        $roles = roles::all();
        return view('backend/datauser/index', compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = user::all();
        $roles = roles::all();
        return view('backend/datauser/index', compact('users','roles'));
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
        // $request->validate([
        //     'username' => 'required|unique:post',
        //     'roles_id' => 'required',
        //     'password' => 'required'
        // ]);
        $user = new user;
        $user->username = $request->username;
        $user->roles_id = $request->roles_id;
        $user->password = bcrypt($request->username);
        $user->save();
            toastr()->success('Data berhasih disimpan', 'Pesan berhasil');
            return redirect('user');
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
        $users = user::find($request->id);
        $roles = roles::all();
        return view('backend/datauser/ubah', compact('users','roles'));
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
        $user = user::find($id);
        $user->username = $request->username;
        $user->password = bcrypt($request->username);
            if($user->save()){
                toastr()->success('Data berhasih diperbaharui', 'Pesan berhasil');
                return redirect('user');
            }else{
                toastr()->error('Data gagal diperbaharui', 'Pesan Gagal');
                return redirect('user');
            }
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

    public function hapus(Request $request)
    {
        //
        $users = user::findOrFail($request->id);
        $users->delete();
        toastr()->success('Data berhasih dihapus', 'Pesan berhasil');
        return redirect('user');
    }

}
