<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function formlogin() 
    {
        return view('login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required']
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.'
    ])->onlyInput('email');
}
   public function destroy(Request $request){
    Auth::logout(); // keluarin user
    $request->session()->invalidate(); // hancurkan session lama
    $request->session()->regenerateToken(); // bikin token CSRF baru
    return redirect('/login'); // arahkan ke login
     }

}
