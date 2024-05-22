<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('panel.user.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('panel.user.edit', compact('user'));
    }

    //kullanıcıların tclerini alıp aynı tcye sahip var mı bak

    public function isimMailGuncelle(Request $request, $id){
        $user = User::find($id);

        if (empty($request->name) || empty($request->email)) {
            Alert::error('Hata', 'Ad veya e-posta boş olamaz.');
            return redirect()->back()->withInput();
        }

        $tcDuplicate = User::where('tc', $request->tc)->where('id', '!=', $id)->first();
        if ($tcDuplicate) {
            Alert::error('Hata', 'Bu TC ile kayıtlı başka bir kullanıcı var.');
            return redirect()->back()->withInput();
        }

        $emailDuplicate = User::where('email', $request->email)->where('id', '!=', $id)->first();
        if ($emailDuplicate) {
            Alert::error('Hata', 'Bu e-posta ile kayıtlı başka bir kullanıcı var.');
            return redirect()->back()->withInput();
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->tc = $request->tc;

        $user->il = $request->il;
        $user->ilce = $request->ilce;
        $user->mahalle = $request->mahalle;
        $user->adres = $request->adres;
        $user->posta_kodu = $request->posta_kodu;

        if($user->save()){
            Alert::success('Başarılı','Güncelleme işlemi başarılı.');
            return redirect()->back();
        }else{
            Alert::error('Hata','Güncellenemedi.');
            return redirect()->back()->withInput(); 
        }
    }

    public function passwordChange(Request $request, $id){
        $user = User::find($id);

        if (!Hash::check($request->current_password, $user->password)) {
            Alert::error('Hata', 'Mevcut şifre yanlış.');
            return back();
        }

        $user->password = Hash::make($request->new_password);

        if($user->save()){
            Alert::success('Başarılı','Şifre başarıyla güncellendi.');
            return back();
        }else{
            Alert::error('Hata','Şifre güncellenemedi.');
            return back();
        }
    }

    function delete($id){
        $user = User::find($id);

        if($user->delete()){
            Alert::success('Başarılı','Kullanıcı Silindi')->toast();
            return back();
        }else {
            Alert::error('Hata','Kullanıcı Silinemedi.');
            return back();
        }
    }
}
