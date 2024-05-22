<?php

namespace App\Http\Controllers\Satis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Satis;
use App\Models\Sepet;

class SatisController extends Controller
{
    public function index(){
        $satis =Satis::all();
        return view("panel.satis.index", compact('satis'));
    }

    public function delete(Request $request){
        $satislar = Satis::where('urun_id', $request->urun_id)->get();

        if($satislar->isNotEmpty()){
            foreach($satislar as $satis){
                Sepet::where('urun_id', $satis->urun_id)->delete();
            }
        }
    }
    
}
