@include('layouts.head')
@include('layouts.navbar')

<div class="container">
    <div class="d-flex justify-content-between align-items-start fixed-top p-3" style="margin-top: 5rem; z-index:998;">
        <div style="margin-left: 15px;">
            <h4>{{ $urun->name }}</h4>

            <p class="btn text-align-center bg-dark"
                style="cursor: default; background-color: transparent; border:1px solid #000000; color:#ffffff; width: 150px; height: 40px; margin-bottom: 1rem !important; margin-top: 1rem !important;">
                {{ $urun->price }}₺
            </p>
        </div>

        <div>
            <form action="{{ route('panel.sepet.add') }}" method="POST">
                @csrf
                <input type="hidden" name="urun_id" value="{{ $urun->id }}">
                <input type="number" name="qty" value="1" min="1" style="display: none;">
                <button type="submit" class="btn text-align-center bg-dark"
                    style=" border:1px solid #000000; color:#ffffff; width: 150px; height: 40px; margin-bottom: 1rem !important;">
                    Sepete Ekle
                </button>
            </form>
        </div>
    </div>

    <div class="container" style="margin-top: 7rem;">
        <img src="{{ asset('assets/img/urun_photo/' . $urun->header_img) }}" alt=""
            style="width: 80%; margin-left:8rem;">
    </div>


    <!--margin-bottom: 1rem !important; dememizin sebebi important ile  başka marginin onu ezmesini önledik-->
    <div>
        <form action="{{ url('panel/sepet/add') }}" method="POST">
            @csrf
            <input type="hidden" name="urun_id" value="1">
            <input type="hidden" name="qty" value="1">
        </form>
    </div>

    <div class="container" style="margin-top: 5rem !important;">
        <div class="row">
            <div class="col-12">
                <h3>{{ $urun->name }}</h3>
                <h4>
                    Geleceğin Çevreci Otomatik Balık Yemleme Cihazı
                </h4>
                <br>
                <p class="text-left">Doğanın dengesini korumak ve akvaryum hobinizden maksimum keyif almak artık çok
                    daha kolay! Umay Feeder, yenilikçi ve tamamen çevreci teknolojisi ile akvaryumunuzdaki balıklarınıza
                    hassas ve düzenli bir şekilde yemleme yapmanızı sağlar. Gelişmiş sensörleri ve özelleştirilebilir
                    zamanlama özellikleri ile Umay Feeder, balıklarınızın sağlıklı ve mutlu kalmasına yardımcı olur.
                </p>
            </div>

        </div>
    </div>


    <div class="container mb-5" style="margin-top: 4rem !important;">
        <div class="row">

            <div class="col-md-6 d-flex flex-column justify-content-center ">
                <h5>Özellikler</h5>
                <ul>
                    <li><b>Çevre Dostu Tasarım:</b> Umay Feeder, sürdürülebilir malzemeler kullanılarak üretilmiştir ve
                        enerjisini tamamen yenilenebilir kaynaklardan alır.</li>
                    <li><b>Kullanıcı Dostu Arayüz:</b> Akıllı telefonunuzdan kolayca kontrol edilebilen ve
                        programlanabilen bir arayüze sahiptir. Uygulamamız üzerinden yemleme zamanlarını ayarlayabilir
                        ve balık sağlığınızı takip edebilirsiniz.</li>
                    <li><b>Enerji Verimliliği:</b> Düşük enerji tüketimi ile çevreye olan etkinizi minimize ederken,
                        akvaryumunuzun mükemmel dengede kalmasını sağlar.</li>
                </ul>
                <h5>Nasıl Çalışır?</h5>
                <p>
                    Umay Feeder, içerisine koyduğunuz balık yemini, programladığınız zamanlarda balıklarınıza ulaştırır.
                    Yemleme sıklığı ve miktarı, balık türünüze ve akvaryumunuzun büyüklüğüne göre kolayca ayarlanabilir.
                    Gelişmiş algoritmaları sayesinde, balık yemini en verimli şekilde kullanır ve israfı önler.
                </p>
                <h5>
                    Çevre ile Uyumlu
                </h5>
                <p>
                    Umay Feeder kullanarak hem akvaryumunuzdaki ekosistemi desteklemiş olursunuz hem de doğal
                    kaynakların korunmasına katkıda bulunursunuz. Çünkü Umay Feeder, çevre üzerindeki olumsuz etkileri
                    en aza indirgemek için tasarlanmıştır.
                </p>
            </div>

            <div class="col-md-6">
                <div class="col-12 mb-4">
                    <img src="{{ asset('asset/image/umay_4.webp') }}" alt="" style="width: 100%;">
                </div>

                <div class="col-12">
                    <img src="{{ asset('asset/image/umay_5.webp') }}" alt="" style="width: 100%;">
                </div>
            </div>

        </div>
    </div>

    {{-- <div class="container" style="margin-top: 7rem !important; margin-bottom: 4rem !important;">
        <div class="row">
            <div class="col-3" style="width: 18rem; margin-top:0%; border:none;">
                <img class="card-img-top" src="{{ asset('asset/image/photo11.png') }}" alt="Card image cap"
                    style="border-top-left-radius: 10px; border-top-right-radius: 10px;">

                <div class="card-body">
                    <p class="card-text" style="font-weight: 600;">Umay Lighter</p>
                </div>
            </div>

            <div class="col-3" style="width: 18rem; margin-top:0%; border:none;">
                <img class="card-img-top" src="{{ asset('asset/image/photo12.png') }}" alt="Card image cap"
                    style="border-top-left-radius: 10px; border-top-right-radius: 10px;">

                <div class="card-body">
                    <p class="card-text" style="font-weight: 600;">Umay Power</p>
                </div>
            </div>

            <div class="col-3" style="width: 18rem; margin-top:0%; border:none;">
                <img class="card-img-top" src="{{ asset('asset/image/photo13.png') }}" alt="Card image cap"
                    style="border-top-left-radius: 10px; border-top-right-radius: 10px;">

                <div class="card-body">
                    <p class="card-text" style="font-weight: 600;">Umay Feeder Kedi</p>
                </div>
            </div>

            <div class="col-3" style="width: 18rem; margin-top:0%; border:none;">
                <img class="card-img-top" src="{{ asset('asset/image/photo14.png') }}" alt="Card image cap"
                    style="border-top-left-radius: 10px; border-top-right-radius: 10px;">

                <div class="card-body">
                    <p class="card-text" style="font-weight: 600;">Umay Feeder Köpek</p>
                </div>
            </div>
        </div>

    </div> --}}
</div>
@include('layouts.footer')
