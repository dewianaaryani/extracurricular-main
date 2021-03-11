<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index(){
        $user = Auth::user();
        if(!empty($user)){
            return redirect('admin');
        }
        return view('Admin.Login.index');
    }
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');
        // dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin/');
        }

        return back()->withErrors([
            'username' => 'SALAH CUY.',
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect('admin/login');
    }
}