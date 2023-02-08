<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function login()
    {
        /*
        echo 'mans_lietotāja_vārds : <input value="'
        . \Illuminate\Support\Facades\Hash::make('parole')
        . '">';
        exit();
      */   
     return view(
     'authorization.login',
     [
     'title' => 'Pieslēgties'
     ]
     );
    }
    
    public function authenticate(Request $request)
{
 $credentials = $request->only('name', 'password');
 if (Auth::attempt($credentials)) {
 $request->session()->regenerate();
 return redirect('books');
 }
 return back()->withErrors([
 'name' => 'Pieslēgšanās neveiksmīga',
 ]);
}

public function logout(Request $request)
{
 Auth::logout();
 $request->session()->invalidate();
 $request->session()->regenerateToken();
 return redirect('/');
}

}
