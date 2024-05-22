<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->method() == 'GET') {
            return view("login");
        } else if ($request->method() == 'POST') {
            $data = $request->only("email", "password");

            if(Auth::attempt($data)){
                Alert::success('Başarılı',"Giriş işlemi başarılı");
                return back();
            }else{
                Alert::error('Hata',"Email veya parola yanlış.");
                return back();
            }
        }
    }  
    
    public function registerPage()
    {
        return view("register");
    }

    public function register(Request $request)
    {
        //dd($request->all());
        $data = $request->only("name", "email", "password");
        $data['password'] = bcrypt($data['password']);
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();

        return redirect(route("login"))->with("register", "Kayıt işlemi başarılı");
    }

    public function logout()
    {
        auth()->logout();

        return redirect(route("login"))->with("login", "Oturum başarıyla kapatıldı.");
    }
}
