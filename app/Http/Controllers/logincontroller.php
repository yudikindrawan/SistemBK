<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role;
Use Alert;
use Auth;

class logincontroller extends Controller
{
    //
    public function __construct()
        {
            $this->middleware('guest');
        }
        public function getlogin()
        {
            return view('login');
        }
        public function postLogin(Request $data){
            if(Auth::attempt(['username' => $data->username, 'password' => $data->password]))
            
            {
                if(Auth::user()->roles->nama_role === 'Admin'){
                    toastr()->success('Hoorayy anda Berhasil log in!', 'Selamat yaa!');
                    return redirect(route('dashboard'));
                }
                elseif(Auth::user()->roles->nama_role === 'BK'){
                    toastr()->success('Hoorayy anda Berhasil log in!', 'Selamat yaa!');
                    return redirect(route('dashboard'));
                }
                elseif(Auth::user()->roles->nama_role === 'Kepsek'){
                    toastr()->success('Hoorayy anda Berhasil log in!', 'Selamat yaa!');
                    return redirect(route('dashboard'));
                }
                elseif(Auth::user()->roles->nama_role === 'OrangTua'){
                    toastr()->success('Hoorayy anda Berhasil log in!', 'Selamat yaa!');
                    return redirect(route('dashboard'));
                }
                elseif(Auth::user()->roles->nama_role === 'Guru'){
                    toastr()->success('Hoorayy anda Berhasil log in!', 'Selamat yaa!');
                    return redirect(route('siswaview'));
                }
                else{
                    return redirect(route('logout'));
                }

            }else{
                toastr()->error('Hhmm maaf ya anda kurang beruntung!', 'Tak ku sangka ini harus terjadi');
                return redirect(route('login'));
            }
        }
}
