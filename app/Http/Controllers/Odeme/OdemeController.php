<?php

namespace App\Http\Controllers\Odeme;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Iyzipay\Model\CheckoutForm;
use Iyzipay\Request\RetrieveCheckoutFormRequest;
use RealRashid\SweetAlert\Facades\Alert;


use Iyzipay\Model\Address;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\CheckoutFormInitialize;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Options;
use Iyzipay\Request\CreateCheckoutFormInitializeRequest;
use App\Models\User;
use App\Models\Sepet;
use App\Models\Siparis;

class OdemeController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $tc = $user->tc;
        $odeme_adres = $user->adres;
        $sehir = $user->il;
        $ulke = "Türkiye";
        $posta_kodu = $user->posta_kodu;

        $isimArray = explode(" ", $user->name);
        $telefon = $user->phone;
        $mail = $user->email;
        $adres = $user->adres;

        $totalPrice = $request->totalPrice;
        $basketName = $request->basket_name;
        $basketCategory = $request->basket_category;

        if (count($isimArray) >= 2) {
            $soyIsim = array_pop($isimArray); 
            $isim = implode(" ", $isimArray); 
        } else {
            $isim = $isimArray[0];
            $soyIsim = "";
        }

        $options = new Options();
        $options->setApiKey('aYSCopjei05YxaPlDJw3pqzM3FcZ2tkN');
        $options->setSecretKey('dKFjioTQOEWQlyQ3TcKszQR9ULmGukyf');
        $options->setBaseUrl('https://api.iyzipay.com/'); 

        //ödeme formu oluşturmak için istek oluştur;
        $request = new CreateCheckoutFormInitializeRequest(); 
        $request->setLocale(Locale::TR);
        $request->setConversationId($user->id);
        $request->setPrice($totalPrice); 
        $request->setPaidPrice($totalPrice); 
        $request->setCurrency(Currency::TL);
        $request->setBasketId($user->id);
        $request->setPaymentGroup(PaymentGroup::PRODUCT);
        $request->setCallbackUrl(route('iyzico-callback')); 
        $request->setEnabledInstallments(array(2, 3, 6, 9));

        //alıcı bilgileri için;
        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId($user->id);
        $buyer->setName($isim);
        $buyer->setSurname($soyIsim);
        $buyer->setGsmNumber($telefon);
        $buyer->setEmail($mail);
        $buyer->setIdentityNumber($tc);
        $buyer->setLastLoginDate(\Carbon\Carbon::now()->format('Y-m-d H:i:s')); //alıcının son giriş tarihini belirtir.
        $buyer->setRegistrationDate(\Carbon\Carbon::now()->format('Y-m-d H:i:s')); //alıcının kayıt tarihini belirtir.
        $buyer->setRegistrationAddress($odeme_adres);
        $buyer->setIp($_SERVER['REMOTE_ADDR']); //alıcının IP adresini alır. 
        $buyer->setCity($sehir); //?
        $buyer->setCountry("Turkey");
        $buyer->setZipCode($posta_kodu);

        $request->setBuyer($buyer);

        //gönderim adresi için;
        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName($isim);
        $shippingAddress->setCity($sehir);
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress($adres);
        $shippingAddress->setZipCode($posta_kodu);
        $request->setShippingAddress($shippingAddress);

        //faturalandırma adresi için;
        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName("Scadya Teknoloji Limited Şirketi");
        $billingAddress->setCity("Nevşehir");
        $billingAddress->setCountry("Türkiye");
        $billingAddress->setAddress("2000 Evler Mah. Üniversite Alanı Küme Evler Bilim Teknoloji Uygulama Araştırma Merkezi No:13");
        $billingAddress->setZipCode("50300");

        $request->setBillingAddress($billingAddress);

        //sepet öğeleri için;
        $basketItems = array(); //sepet öğelerinin tutulacağı bir dizi oluşturulur.
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId(rand(0,9999)); //sepet öğesine bir kimlik atanır. 
        $firstBasketItem->setName($basketName); 
        $firstBasketItem->setCategory1($basketCategory);
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice($totalPrice);
        $basketItems[0] = $firstBasketItem;

        $request->setBasketItems($basketItems);

        // Ödeme formunu başlat
        $checkoutFormInitialize = CheckoutFormInitialize::create($request, $options); //ödeme formu oluşturur
        $getStatus = $checkoutFormInitialize->getStatus();
        $error = $checkoutFormInitialize->getErrorMessage();
        $paymentinput = $checkoutFormInitialize->getCheckoutFormContent();

        // dd($checkoutFormInitialize->getStatus());

        if ($checkoutFormInitialize->getStatus() == "success") {
            $paymentInput = $checkoutFormInitialize->getCheckoutFormContent();

            // dd($paymentInput);

            return response()->json(['paymentInput' => $paymentInput]);
            //return response($paymentInput);
        } else {
            // dd($checkoutFormInitialize);
            Alert::error('Hata', $checkoutFormInitialize->getErrorMessage());
            return response()->json(['error' => $checkoutFormInitialize->getErrorMessage()]);
            //return redirect()->back()->with('error', $checkoutFormInitialize->getErrorMessage());  
        }
    }

    function callBack(Request $request){

        $options = new Options();
        $options->setApiKey('aYSCopjei05YxaPlDJw3pqzM3FcZ2tkN');
        $options->setSecretKey('dKFjioTQOEWQlyQ3TcKszQR9ULmGukyf');
        $options->setBaseUrl('https://api.iyzipay.com/');

        // Geri çağırma için istek oluştur
        $checkOutForRequest = new RetrieveCheckoutFormRequest();
        $checkOutForRequest->setLocale(Locale::TR);
        //$checkOutForRequest->setConversationId($id);
        $checkOutForRequest->setToken($request->token);

        // Ödeme formunu geri çağır
        $checkoutForm = CheckoutForm::retrieve($checkOutForRequest, $options);

        // dd($checkoutForm);

        $user = User::find($checkoutForm->getBasketId());

        // Kullanıcının sepet bilgisini al

        // $cartItem = Sepet::where("created_by", $user->id)->first();

        // if ($cartItem) {
        //     $isConfirmed = $cartItem->durum == 1 ? 1 : 0;
        // } else {
        //     $isConfirmed = 0;
        // }


        if ($checkoutForm->getStatus() == "success" && $user) {

            Auth::login($user);

            $sepet = Sepet::where("created_by", $user->id)->first();

            $siparis = new Siparis();
            $siparis->user_id = $sepet->created_by;
            $siparis->urun_id = $sepet->urun_id;
            $siparis->qty = $sepet->qty;
            
            
            //$sepet->durum = 0;

            if($siparis->save()){
                $sepet->qty = 0;
                $sepet->save();
            }

            // Sepet::where('created_by', $user->id)->update(['odeme' => 1]);
            // Sepet::where('created_by', $user->id)->update(['durum' => 1]);


            $details = [
                'title' => 'Siparişiniz Onaylandı!',
                'body' => 'Merhaba,

                Siparişiniz başarıyla onaylandı ve işleme alındı.
                Siparişiniz en kısa sürede hazırlanacak ve kargoya verilecektir.'
            ];
            
           // \Mail::to($user->email)->send(new \App\Mail\MyTestMail($details));

            Alert::success('Başarılı', 'Ödeme Başarılı');
            return redirect('/siparislerim')->with('success', 'Ödeme Başarılı');
        } else {
            Alert::error('Hata', 'Ödeme Başarısız.');
            return redirect('/sepet')->with('error', 'İşlem sırasında bir hata oluştu.');
        }
    }
}
