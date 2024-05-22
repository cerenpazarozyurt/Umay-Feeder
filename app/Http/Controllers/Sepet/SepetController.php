<?php

namespace App\Http\Controllers\Sepet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sepet;
use App\Models\Urun;
use App\Models\User;
use App\Models\Siparis;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class SepetController extends Controller
{
    public function index(){

        $cartItem = session('cart', []);
        $totalPrice = 0;

        foreach ($cartItem as $urun){
            $totalPrice += $urun['price'] * $urun['qty'];
        }

        return view("panel.sepet.index", compact('cartItem', 'totalPrice'));
    }


    public function add(Request $request) {
        $urunID = $request->urun_id;
        $qty = $request->qty ?? 1;

        $urun = Urun::find($urunID);
        if (!$urun) {
            Alert::error('Hata', 'Ürün bulunamadı.');
            return back();
        }

        $user_id = Auth::id() ?? "0";
        $cart = session()->get('cart', []);

        if (array_key_exists($urunID, $cart)) {
            $cart[$urunID]['qty'] += $qty;
        } else {
            $cart[$urunID] = [
                'urun_id' => $urunID,
                'image' => $urun->header_img,
                'name' => $urun->name,
                'price' => $urun->price,
                'qty' => $qty,
                'created_by' => $user_id,
            ];
        }

        session(['cart' => $cart]);

        $sepet = Sepet::firstOrCreate(
            ['created_by' => $user_id, 'urun_id' => $urunID],
            ['qty' => 0, 'price' => $urun->price]
        );

        $sepet->qty += $qty;
        $sepet->save();

        Alert::success('Başarılı', 'Ürün sepete eklendi!');
        return back();
    }

    public function remove(Request $request) {
        $urunID = $request->urun_id;
        $qty = $request->qty ?? 1;

        $user_id = Auth::id() ?? "0";

        $urun = Urun::find($urunID);
        if (!$urun) {
            Alert::error('Hata', 'Ürün bulunamadı.');
            return back();
        }

        $cartItem = session('cart', []);

        if (isset($cartItem[$urunID])) {
            $cartItem[$urunID]['qty'] -= $qty;

            if ($cartItem[$urunID]['qty'] <= 0) {
                unset($cartItem[$urunID]);
                Sepet::where([['created_by', $user_id], ['urun_id', $urunID]])->delete();
                Alert::success('Başarılı', 'Ürün sepetten kaldırıldı!');
            } else {
                $sepet = Sepet::where([['created_by', $user_id], ['urun_id', $urunID]])->first();
                if ($sepet) {
                    $sepet->qty = $cartItem[$urunID]['qty'];
                    $sepet->save();
                    Alert::success('Başarılı', 'Ürün miktarı güncellendi!');
                }
            }

            session(['cart' => $cartItem]);
        } else {
            Alert::info('Bilgi', 'Ürün sepetinizde bulunamadı.');
        }

        return back();
    }


    public function onayla(Request $request) {
        $user = Auth::user();

        if (!$user) {
        session()->flash('message', 'Lütfen giriş yapın veya kayıt olun.');
        return redirect()->back();
        }

        if (!$user->adres) {
            session()->flash('message', 'Lütfen adres bilgilerinizi doldurun.');
            return redirect()->back();
        }

        Sepet::where('created_by', $user->id)
        ->where('durum', 0)
        ->update(['durum' => 1, 'odeme' => 1]);

        session()->forget('cart');

        return redirect()->route('siparislerim');

        //return "OK";
    }

    public function siparislerim()
    {
        $user_id = Auth::id();
        // $siparisler = Sepet::where('created_by', $user_id)
        //                     ->where('durum', 1)
        //                     ->where('odeme', 1)
        //                     ->with('urun')
        //                     ->get();

        // foreach ($siparisler as $siparis) {
        //     $siparis->totalPrice = $siparis->qty * $siparis->urun->price;
        // }


        $siparisler = Siparis::where('user_id', $user_id)->with("getUrun")->get();


        return view('siparislerim', compact('siparisler'));
    }

    public function delete(Request $request) {
        $urunID = $request->urun_id ?? null;

        $user_id = Auth::id() ?? "0";

        $cart = session('cart', []);

        if ($urunID !== null) {
            if (array_key_exists($urunID, $cart)) {
                unset($cart[$urunID]);
                Sepet::where([['created_by', $user_id], ['urun_id', $urunID]])->delete();
            }
        } else {
            $cart = [];
            Sepet::where('created_by', $user_id)->delete();
        }

        session(['cart' => $cart]);

        if (empty($cart)) {
            return back()->with('sepet_bos', true);
        }

        return back()->withSuccess('Ürün Başarıyla Sepetten Kaldırıldı.');
    }
}