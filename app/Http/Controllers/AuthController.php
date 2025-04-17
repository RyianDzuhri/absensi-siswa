<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthVerifyRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function index() : View
    {
        return view('auth.login');
    }

    public function verify(UserAuthVerifyRequest $request) : RedirectResponse
    {
        $data = $request->validated();

        if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password'], 'role'=>'admin'])){
            $request->session()->regenerate();
            return redirect()->intended('/admin/home');
        }else if(Auth::guard('wali_kelas')->attempt(['email'=>$data['email'], 'password'=>$data['password'], 'role'=>'wali_kelas'])){
            $request->session()->regenerate();
            return redirect()->intended('/walikelas/home');
        }else if(Auth::guard('ortu')->attempt(['email'=>$data['email'], 'password'=>$data['password'], 'role'=>'ortu'])){
            $request->session()->regenerate();
            return redirect()->intended('/ortu/home');
        }else{
            return redirect(route('login'))->with('msg', 'Email Dan Password Yang Anda Masukkan Salah');
        }

        //Kalau mau debugging
        // dd($request->validated());
    }

    public function logout(): RedirectResponse
    {
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }else if(Auth::guard('wali_kelas')->check()){
            Auth::guard('wali_kelas')->logout();
        }else if(Auth::guard('ortu')->check()){
            Auth::guard('ortu')->logout();
        }
        return redirect(route('login'));
    }
}
