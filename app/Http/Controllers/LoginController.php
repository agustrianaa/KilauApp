<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        $namaUser = Auth::check() ? Auth::user()->name : 'Guest';

        return view('auth.login', compact('namaUser'));
    }

    public function login_proses(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Email wajib diisi',
            'password' => 'Password wajib diisi',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('admin.menu');
        }else{
            return redirect()->route('login')->with('failed','Email atau Password Salah');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil Logout');
    }

    public function register() {
        return view('auth.register');
    }

    public function register_proses(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ],[
            'nama'=> 'Nama Wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah ada dalam database',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        $data['name']       = $request->nama;
        $data['email']      = $request->email;
        $data['password']   = Hash::make($request->password);

        User::create($data);

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($login)){
            return redirect()->route('admin.menu');
        }else{
            return redirect()->route('login')->with('failed','Email atau Password Salah');
        }
    }
}     
