<?php

namespace App\Http\Controllers\Urun;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Urun;
use App\Models\Urun_photo;
use RealRashid\SweetAlert\Facades\Alert;

class UrunController extends Controller
{
    function index(){
        $urun = Urun::get();

        return view("panel.urun.index", compact('urun'));
    }

    public function create(Request $request){
        return view("panel.urun.create");
    }

    public function store(Request $request){
        $data = $request-> all();

        if($request->hasFile("kapak_foto")){
            $file=$request->file('kapak_foto');
        
            try{
                $foto_adi = date('YmdHis') . str_replace(" ", "_", $file->getClientOriginalName());
                $foto_adi = str_replace("(", "", $foto_adi); 
                $foto_adi = str_replace(")", "", $foto_adi);
                $url = $file->move(public_path('asset/image/urun_photo'), $foto_adi); 
                $data["header_img"] = $foto_adi;
                $data["photo_name"] = $foto_adi;
            }   
            catch (Exception $e){ 
                return redirect()->back()->with("urun", $e);
            }
        }

        $urun = new Urun();
        $urun->name = $request->name;
        $urun->price = $request->price;
        $urun->header_img = $data["header_img"];
        $urun->header_photos = $foto_adi;
        $urun->save();

        if ($request->hasFile('images')) { 
    
            $file = $request->file('images');

            try {
                foreach ($request->file('images') as $file) { 

                $foto_adi = date('YmdHis') . str_replace(" ", "_", $file->getClientOriginalName());
                $foto_adi = str_replace("(", "", $foto_adi);
                $foto_adi = str_replace(")", "", $foto_adi);
                $url = $file->move(public_path('asset/image/urun_photo'), $foto_adi);
                
                $foto = new urun_photo();  
                $foto->urun_id = $urun->id; 
                $foto->photo_name = $foto_adi;
                $foto->save();
                } 
            } catch (Exception $e){
                Alert::success('Hata',$e->getMessage());
                return back();
            }
        }

        if($urun){
            Alert::success('Başarılı','Ürün kaydedildi.');
            return back();
        }else{
            Alert::error('Hata','Ürün kaydedilemedi.');
            return back();
        }
    }

    function edit($id){
        $urun = Urun::find($id);
        $resim = Urun_photo::where("urun_id", $urun->id)->get();
        return view("panel.urun.edit", compact("urun","resim"));
    }

    function update(Request $request, $id){
        $urun = Urun::find($id);
        $data = $request->all();

        if ($request->hasFile('kapak_foto')) {

            $file = $request->file('kapak_foto');

            try{
                $foto_adi = date('YmdHis') . str_replace(" ", "_", $file->getClientOriginalName());
                $foto_adi = str_replace("(", "", $foto_adi);
                $foto_adi = str_replace(")", "", $foto_adi);

                $url = $file->move(public_path('assets/img/urun_photo'), $foto_adi);

                $data["header_img"] = $foto_adi;
                $data["photo_name"] = $foto_adi;

            }catch (Exception $e){
                return redirect()->back()->with("urun", $e);
            }
        }

        $urun->name = $request->name;
        $urun->price = $request->price;
            if (isset($data["header_img"])) {
                $urun->header_img = $data["header_img"];
            }
        //$urun->header_photos = $foto_adi;
        $urun->save();

        if ($request->hasFile('images')) {

            $file = $request->file('images');

            try {
                foreach ($request->file('images') as $file) {

                    $foto_adi = date('YmdHis') . str_replace(" ", "_", $file->getClientOriginalName());
                    $foto_adi = str_replace("(", "", $foto_adi);
                    $foto_adi = str_replace(")", "", $foto_adi);

                    $url = $file->move(public_path('assets/img/urun_photo'), $foto_adi);
                    
                    $foto = new urun_photo();
                    $foto->urun_id = $urun->id;
                    $foto->photo_name = $foto_adi;
                    $foto->save();
                }

            } catch (Exception $e){
                Alert::success('Hata',$e->getMessage());
                return back();
            }
        }

        if($urun){
            Alert::success('Başarılı','Güncelleme kaydedildi.');
            return back();
        }else{
            Alert::error('Hata','Güncelleme kaydedilemedi.');
            return back();
        }
    }

    function delete($id){
        $urun = Urun::find($id);

        if($urun->delete()){
            Alert::success('Başarılı','Ürün Silindi')->toast();
            return back();
        }else {
            Alert::error('Hata','Ürün Silinemedi.');
            return back();
        }
    }
}
