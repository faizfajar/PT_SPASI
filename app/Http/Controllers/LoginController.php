<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    public function view()
    {
        return view('login', [
            'security' => Str::random(5)
        ]);
    }

    public function attempt(Request $req)
    {
        // dd($req->all());
        $req->validate([
            'username' => 'required',
            'password' => 'required|min:5|max:8',
            'security' => 'required'
        ]);

        if ($req->security != $req->security_text) {
            return redirect()->route('login.showview')->with('error', 'Verify Code Tidak COcok');
        } else {
            $user = Users::where('username', $req->username)->first();
            if ($user) {
                if ($user->password == md5($req->password)) {
                    return redirect()->route('users.index')->with('success', 'Login Berhasil');
                } else {
                    return redirect()->route('login.showview')->with('error', 'Password Salah');
                }
            } else {
                return redirect()->route('login.showview')->with('error', 'Username Salah');
            }
        }
    }
}
