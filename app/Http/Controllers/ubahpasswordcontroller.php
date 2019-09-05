<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

class ubahpasswordcontroller extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function change(){
        return view('backend/datauser/ubah-pass');
    }

    public function changePass(Request $request){
        if(!(Hash::check($request->get('currentpassword'), Auth::user()->password))){
            toastr()->error('Password lama salah. Silahkan coba kembali !', 'Pesan Kurang Beruntung');
            return redirect()->back();
        }

        if(strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0 ){
            toastr()->error('Password baru tidak boleh sama dengan password baru!', 'Pesan Kurang Beruntung');
        }

        $user = Auth::user();
        $user->password = bcrypt($request->get('newpassword'));
        $user->save();
        toastr()->success('Password berhasil diubah', 'Pesan Berhasil');
        return redirect()->back();
    }
}
