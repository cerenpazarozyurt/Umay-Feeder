<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Urun\UrunController;
use App\Http\Controllers\Sepet\SepetController;
use App\Http\Controllers\Satis\SatisController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Delete\DeleteController;
use App\Http\Controllers\Login\LoginController;
use App\Models\Urun;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Sepet;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Odeme\OdemeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/umayfeeder', function(){
    $urun = Urun::findOrFail(11);
    return view('umayfeeder', compact('urun'));
});

Route::get('/umaylighter', function(){
     return view('umaylighter');
 });

Route::get('/umaypower', function(){
     return view('umaypower');
 });

Route::get('/umaynedir', function(){
     return view('umaynedir');
 });

Route::get('/umayblog', function(){
     return view('umayblog');
 });

Route::get('/umayblogdetay', function(){
     return view('umayblogdetay');
 });

// Route::get('/login', function(){
//      return view('login');
// });

Route::get('/register', function(){
     return view('register');
});

Route::get('/profil', function(){
    return view('profil');
})->name('profil');

Route::get('/sepet', function() {
    $error = null;

    if (Auth::check()) {
        // Kullanıcı giriş yapmışsa veritabanından sepet bilgilerini çek
        $cartItem = Sepet::where("created_by", Auth::id())
                        //   ->where('durum', 0)
                        //   ->where('odeme', 0)
                          ->get();
        

        $totalPrice = $cartItem->sum(function ($item) {
            return $item->qty * $item->getFiyat->price; // getFiyat burada bir ilişkiyi (relation) temsil etmeli
        });
    } else {
        // Kullanıcı giriş yapmamışsa session'dan sepet bilgilerini al
        $cartItem = collect(session('cart', [])); // Session'dan alınan veriyi collection'a çevir
        $totalPrice = 0;
        foreach ($cartItem as $urun) {
            $totalPrice += $urun['price'] * $urun['qty'];
        }
    }

    if ($cartItem->isEmpty()) {
        $error = "Sepetinizde ürün bulunmamaktadır.";
    }

    return view('sepet', compact('cartItem', 'totalPrice', 'error'));
});

Route::get('/siparislerim', function () {
    // Sadece durumu 1 olan sepetleri alıyoruz
    $siparisler = Sepet::where([
        ['durum', 1],
        ['odeme',1]
    ])->get();
    
    return view('siparislerim', ['siparisler' => $siparisler]);
})->name('siparislerim');

// Route::get('/send-mail', function () {

//     $details = [
//         'title' => 'Bu Mail info@umayfeeder.com tarafından gönderilmiştir123.',
//         'body' => 'Bu bir test mailidir123.'
//     ];

//     \Mail::to('scadyateknoloji@gmail.com')->send(new \App\Mail\MyTestMail($details));

//     dd("Email gönderildi!");
// });


// Route::get('/dashboard', function () {
//     return view('panel.dashboard');
// });

Route::get('panel/urun-list', [UrunController::class, 'index']) ->name('urun.index');
Route::get('panel/urun/create', [UrunController::class, 'create']) ->name('panel.urun.create');
Route::post('panel/urun/store', [UrunController::class, 'store']) ->name('panel.urun.store');
Route::get('panel/urun/edit/{id}', [UrunController::class, 'edit']) ->name('panel.urun.edit');
Route::post('panel/urun/update/{id}', [UrunController::class, 'update']) ->name('panel.urun.update');
Route::get('panel/urun/delete/{id}', [UrunController::class, 'delete']) ->name('panel.urun.delete');

Route::get('panel/delete/photo/{page}/{id}', [DeleteController::class, 'delete'])->name('deleteUrunImage');

Route::get('panel/sepet', [SepetController::class, 'index'])->name('panel.sepet.index');
Route::post('panel/sepet/add', [SepetController::class, 'add'])->name('panel.sepet.add');
Route::post('panel/sepet/remove', [SepetController::class, 'remove'])->name('panel.sepet.remove');
Route::get('panel/sepet/onay', [SepetController::class, 'onayla'])->name('panel.sepet.onay');
Route::post('panel/sepet/delete', [SepetController::class, 'delete'])->name('panel.sepet.delete');
Route::get('/siparislerim', [SepetController::class, 'siparislerim'])->name('siparislerim');

Route::get('panel/satis', [SatisController::class, 'index'])->name('panel.satis.index');

Route::get('panel/user-list', [UserController::class, 'index']) ->name('panel.user.index');
Route::get('panel/user/edit/{id}', [UserController::class, 'edit']) ->name('panel.user.edit');
Route::post('panel/user/update/{id}', [UserController::class, 'isimMailGuncelle']) ->name('panel.user.update');
Route::post('panel/user/password/{id}', [UserController::class, 'passwordChange']) ->name('panel.user.password');
Route::get('panel/user/delete/{id}', [UserController::class, 'delete']) ->name('panel.user.delete');

Route::get('login', [LoginController::class, 'login'])->name('login');
// Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('register', [LoginController::class, 'registerPage'])->name('register');
// Route::post('register_store', [LoginController::class, 'register'])->name('register_store');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


// Route::get('login', [LoginController::class, 'login'])->name('login');
// Route::post('login', [LoginController::class, 'login'])->name('login');
// Route::get('register', [LoginController::class, 'registerPage'])->name('register');
// Route::post('register_store', [LoginController::class, 'register'])->name('register_store');
// Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('odeme', [OdemeController::class, 'index'])->name('odeme.index');
Route::post('iyzico-callback', [OdemeController::class, 'callBack'])->name('iyzico-callback');
