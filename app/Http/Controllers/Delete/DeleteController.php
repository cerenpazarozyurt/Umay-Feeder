<?php

namespace App\Http\Controllers\Delete;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Urun;
use App\Models\Urun_photo;
use RealRashid\SweetAlert\Facades\Alert;

class DeleteController extends Controller
{
        public function delete($page, $photoId)
        {
            $foto = Urun_photo::find($photoId);
    
            if (!$foto) {
                return redirect()->back()->with("message", "Fotoğraf bulunamadı.");
            }
    
            $klasor = $this->getKlasor($page);
            $fotoYolu = $this->getFotoYolu($klasor, $foto->url);
    
            if (file_exists($fotoYolu)) {
                unlink($fotoYolu);
            }
    
            if($foto->delete()){
                Alert::success('Başarılı','Fotoğraf silme işlemi başarılı.')->toast();
                return back();
            }else {
                Alert::error('Hata','Fotoğraf silme işlemi başarısız.');
                return back();
            }
        }
    
        private function getKlasor($page)
        {
            switch ($page) {
                case 'urun':
                    return 'urunler_photo';
                default:
                    return ''; 
            }
        }
    
        private function getFotoYolu($klasor, $fotoUrl)
        {
            $temelYol = public_path("assets/img/{$klasor}");
            return "{$temelYol}/{$fotoUrl}";
        }
}
    
