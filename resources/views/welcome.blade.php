@include('layouts.head')
@include('layouts.navbar')

<style>
    @media screen and (max-width:768px) {
        .content {
            padding: 0 15px;
        }

        .section {
            padding: 0 15px;
        }

        .blog {
            padding: 0 15px;
        }

    }

    @media screen and (max-width:991px) {
        .card-background {
            height: 11rem !important;
            width: 86% !important;
            bottom: 1rem !important;
            background-image: linear-gradient(#ff000000, #040404) !important;
        }

    }
</style>

<div style="position: relative;">
    <div class="container" style="position: absolute; top:65%; z-index: 99; left:10%;">

        <p class="text-light" style="font-size: 4rem; font-weight: 170;">
            Umay Feeder
        </p>

        <div style="border:1px solid #FBFCFF; width:fit-content; padding:0.4rem; border-radius:4px;">
            <p style="padding:0rem; margin: 0rem;" class="text-light">
                Umay Feeder: Geleceğin Çevreci Otomatik Balık Yemleme Cihazı
            </p>
        </div>
    </div>

    <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none;">

    </div>

    <video width="100%" height="100%" autoplay muted loop>
        <source src="{{ asset('asset/video/video_3.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>



{{-- <div class="content">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 p-3">
                <div class="card" style="position: relative;">
                    <img class="card-img-top" src="{{ asset('asset/image/photo1.png') }}" alt="Card image cap"
                        style="width: 100%;">
                    <div class="card-body d-flex flex-column justify-content-end"
                        style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; background-color: rgba(0, 0, 0, 0.2); color: white; z-index:99">
                        <h5 class="card-title" style="font-weight: 300;">Umay Feeder Otomatik Balık Yemleme Cihazı</h5>

                        <div class="mt-auto">
                            <a href="{{ url('/umayfeeder') }}" class="btn btn-block m-2"
                                style="background-color:#FBFCFF; color:black">İncele</a>
                            <a href="#" class="btn btn-block m-2"
                                style="background-color: transparent; border:1px solid #FBFCFF; color:#FBFCFF">Satın
                                Al</a>
                        </div>
                    </div>
                </div>
                <div class="card-background"
                    style="height: 25rem;position: absolute;z-index: 0;width: 92%;bottom: 1rem;background-image: linear-gradient(#ff000000, #040404);">

                </div>

            </div>

            <div class="col-md-4 p-3">
                <div class="card" style="position: relative;">
                    <img class="card-img-top" src="{{ asset('asset/image/umaypower.png') }}" alt="Card image cap"
                        style="width: 100%;">
                    <div class="card-body d-flex flex-column justify-content-end"
                        style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; background-color: rgba(0, 0, 0, 0.2);  color: white; z-index:99;">
                        <h5 class="card-title" style="font-weight: 300;">Umay
                            Power</h5>
                        <div class="mt-auto">
                            <a href="{{ url('/umaypower') }}" class="btn btn-block m-2"
                                style="background-color:#FBFCFF; color:black">İncele</a>
                            <a href="#" class="btn btn-block m-2"
                                style="background-color: transparent; border:1px solid #FBFCFF; color:#FBFCFF">Satın
                                Al</a>
                        </div>


                    </div>
                </div>
                <div class="card-background"
                    style="height: 25rem;position: absolute;z-index: 0;width: 92%;bottom: 1rem;background-image: linear-gradient(#ff000000, #040404);">

                </div>

            </div>

            <div class="col-md-4 p-3">
                <div class="card" style="position: relative;">
                    <img class="card-img-top" src="{{ asset('asset/image/umaylighter.png') }}" alt="Card image cap"
                        style="width: 100%;">
                    <div class="card-body d-flex flex-column justify-content-end"
                        style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; background-color: rgba(0, 0, 0, 0.2);  color: white; z-index:99;">
                        <h5 class="card-title" style="font-weight: 300;">Umay Lighter</h5>
                        <div class="mt-auto">
                            <a href="{{ url('/umaylighter') }}" class="btn btn-block m-2"
                                style="background-color:#FBFCFF; color:black">İncele</a>
                            <a href="#" class="btn btn-block m-2"
                                style="background-color: transparent; border:1px solid #FBFCFF; color:#FBFCFF">Satın
                                Al</a>
                        </div>

                    </div>
                </div>
                <div class="card-background"
                    style="height: 25rem;position: absolute;z-index: 0;width: 92%;bottom: 1rem;background-image: linear-gradient(#ff000000, #040404);">

                </div>

            </div>

        </div>

    </div>
</div> --}}

<div class="container mt-5">
    <div class="row">
        <div class="col-4 d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-column justify-content-center align-items-center"
                style="border-radius: 100%; background-color:#000000; width:80px; height:80px;">
                <i class="fa-solid fa-seedling" style="font-size: 3rem; color:white;"></i>
            </div>
            <h3>Çevreci</h3>
            <p class="text-center">
                Üretiminde tamamen geri dönüştürülmüş, doğada çözünebilir ve geri dönüştürülebilir malzemeler
                kullanılmıştır.
            </p>
        </div>
        <div class="col-4 d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-column justify-content-center align-items-center"
                style="border-radius: 100%; background-color:#000000; width:80px; height:80px;">
                <i class="fa-solid fa-robot" style="font-size: 3rem; color:white;"></i>
            </div>
            <h3>Otomatik</h3>
            <p class="text-center">
                Belirlediğiniz saat ve porsiyon adedince otomatik yemleme yapar. Balıklarınızın düzenli beslenmesini
                sağlar.
            </p>
        </div>
        <div class="col-4 d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-column justify-content-center align-items-center"
                style="border-radius: 100%; background-color:#000000; width:80px; height:80px;">
                <i class="fa-solid fa-rss" style="font-size: 3rem; color:white;"></i>
            </div>
            <h3>Uzaktan Kontrol</h3>
            <p class="text-center">
                Nerede olursanız olun balıklarınız yemleme durumunu kontrol edebilir, yemleme zamanlarını
                ayarlayabilirsiniz.
            </p>
        </div>

    </div>
</div>

<!--2.BÖLÜM-->
<div class="section mt-5">
    <div class="container p-3" style="border:1px solid black; border-radius:4px;">
        <div class="row align-items-center">

            <div class="col-md-7 mt-md-0 mt-5">
                <div>
                    <h3 class="text-left">Nerede olursan ol <br> UMAY, balık dostlarının yanında!</h3>
                    <p class="text-left">
                        Doğanın dengesini korumak ve akvaryum hobinizden maksimum keyif almak artık çok daha kolay! Umay
                        Feeder, yenilikçi ve tamamen çevreci teknolojisi ile akvaryumunuzdaki balıklarınıza hassas ve
                        düzenli bir şekilde yemleme yapmanızı sağlar. Gelişmiş sensörleri ve özelleştirilebilir
                        zamanlama özellikleri ile Umay Feeder, balıklarınızın sağlıklı ve mutlu kalmasına yardımcı olur.
                    </p>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="{{ url('/umayfeeder') }}" class="btn btn-block m-2"
                            style="background-color: black;border:1px solid #000000;color: #ffffff;">
                            <i class="fa-solid fa-fish-fins"></i>
                            İncele</a>
                    </div>

                </div>
            </div>


            <div class="col-md-5 mt-md-0 mt-5">
                <img style="max-width: 100%; height: auto; margin-left: 25%; margin-right: auto; display: block; border-radius: 4px;"
                    src="{{ asset('asset/image/umay_9.png') }}" alt="">

            </div>

        </div>

    </div>
</div>

<div class="section mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <img src="{{ asset('asset/image/umay_7.png') }}" alt="umay foto" style="width:100%; border-radius:4px;"
                    data-toggle="modal" data-target="#imageModal" onclick="changeImage(this.src)">
            </div>

            <div class="col-12 col-md-4">
                <img src="{{ asset('asset/image/umay_6.png') }}" alt="umay foto" style="width:100%; border-radius:4px;"
                    data-toggle="modal" data-target="#imageModal" onclick="changeImage(this.src)">
            </div>
            <div class="col-12 col-md-4">
                <img src="{{ asset('asset/image/umay_8.png') }}" alt="umay foto" style="width:100%; border-radius:4px;"
                    data-toggle="modal" data-target="#imageModal" onclick="changeImage(this.src)">
            </div>
        </div>
    </div>
</div>

<div class="section mt-5">
    <div class="container mt-5 mb-5">

        <div class="row g-2">
            <div class="col-md-4">
                <div class="card p-3 text-center px-4">

                    <div class="user-image">

                        <img src="{{ asset('asset/image/user.jpg') }}" class="rounded-circle" width="80">

                    </div>

                    <div class="user-content">

                        <h5 class="mb-0">Nurullah Ayhan</h5>
                        <span>Elektirk Elektronik Mühendisi</span>
                        <p>İşimin yoğunluğundan dolayı balıkları beslemeyi hep unutuyordum. Bu cihaz ile artık öyle bir derdim yok.</p>

                    </div>

                    <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>

                    </div>

                </div>
            </div>

            <div class="col-md-4">

                <div class="card p-3 text-center px-4">

                    <div class="user-image">

                        <img src="{{ asset('asset/image/user.jpg') }}" class="rounded-circle" width="80">

                    </div>

                    <div class="user-content">

                        <h5 class="mb-0">Mehmet Uğur Şahin</h5>
                        <span>Bilgisayar Mühendisi</span>
                        <p>Balıkları hep ihmal ediyordum artık otomatik olarak yemleniyorlar çok rahatım.</p>

                    </div>

                    <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card p-3 text-center px-4">

                    <div class="user-image">

                        <img src="{{ asset('asset/image/user.jpg') }}" class="rounded-circle" width="80">

                    </div>

                    <div class="user-content">

                        <h5 class="mb-0">Mazlum Kaya</h5>
                        <span>Girişimci</span>
                        <p>İş gezileri sırasında aklım hep evdeki balıklarda kalıyordu artık telefondan kontrol edebiliyorum.</p>

                    </div>

                    <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>

                    </div>

                </div>

            </div>


        </div>

    </div>
</div>


<!--3.BÖLÜM-->

<div class="blog">
    <div class="container mt-5">
        <h2>Umay Feeder Blog</h2>

        <div class="row">

            <div class="col-md-4">
                <div class="row">

                    <div class="col-md-6 p-1">
                        <img src="{{ asset('asset/image/photo2.png') }}" alt="" style="width: 100%;">

                        <h5
                            style="position: absolute; top: 75%; text-shadow: 2px 2px 4px rgba(0, 0, 0, 10); color: white; z-index:99; font-weight:250; margin-left:1rem;">
                            Umay Feeder</h5>
                    </div>

                    <div class="col-md-6 p-1">
                        <img src="{{ asset('asset/image/photo3.png') }}" alt="" style="width: 100%;">

                        <h5
                            style="position: absolute; top: 75%; text-shadow: 2px 2px 4px rgba(0, 0, 0, 10); color: white; z-index:99; font-weight:250; margin-left:1rem;">
                            Umay Feeder</h5>
                    </div>

                    <div class="col-md-12 p-1">
                        <img src="{{ asset('asset/image/photo4.png') }}" alt="" style="width: 100%;">

                        <h5
                            style="position: absolute; top: 75%; text-shadow: 2px 2px 4px rgba(0, 0, 0, 10); color: white; z-index:99; font-weight:250; margin-left:1rem;">
                            Umay Feeder Otomatik Balık <br>Yemleme Cihazı</h5>
                    </div>

                </div>
            </div>

            <div class="col-md-4">

                <div class="row">
                    <div class="col-md-12 p-1">
                        <img src="{{ asset('asset/image/photo5.png') }}" alt="" style="width: 100%;">

                        <h5
                            style="position: absolute; top:75%; text-shadow: 2px 2px 4px rgba(0, 0, 0, 10); color:white; z-index:99; font-weight:250; margin-left:1rem; ">
                            Umay Feeder Otomatik Balık <br>Yemleme Cihazı</h5>
                    </div>

                    <div class="col-md-6 p-1">
                        <img src="{{ asset('asset/image/photo2.png') }}" alt="" style="width: 100%;">

                        <h5
                            style="position: absolute; top: 75%; text-shadow: 2px 2px 4px rgba(0, 0, 0, 10); color: white; z-index:99; font-weight:250; margin-left:1rem;">
                            Umay Feeder</h5>

                    </div>

                    <div class="col-md-6 p-1">
                        <img src="{{ asset('asset/image/photo3.png') }}" alt="" style="width: 100%;">

                        <h5
                            style="position: absolute; top: 75%; text-shadow: 2px 2px 4px rgba(0, 0, 0, 10); color: white; z-index:99; font-weight:250; margin-left:1rem;">
                            Umay Feeder</h5>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="row">

                    <div class="col-md-6 p-1">
                        <img src="{{ asset('asset/image/photo6.png') }}" alt="" style="width: 100%;">

                        <h5
                            style="position: absolute; top: 75%; text-shadow: 2px 2px 4px rgba(0, 0, 0, 10); color: white; z-index:99; font-weight:250; margin-left:1rem;">
                            Umay Feeder</h5>

                    </div>
                    <div class="col-md-6 p-1">
                        <img src="{{ asset('asset/image/photo7.png') }}" alt="" style="width: 100%;">

                        <h5
                            style="position: absolute; top: 75%; text-shadow: 2px 2px 4px rgba(0, 0, 0, 10);  color: white; z-index:99; font-weight:250; margin-left:1rem;">
                            Umay Feeder</h5>
                    </div>

                    <div class="col-md-12 p-1">
                        <img src="{{ asset('asset/image/photo8.png') }}" alt="" style="width: 100%;">

                        <h5
                            style="position: absolute; top: 75%; text-shadow: 2px 2px 4px rgba(0, 0, 0, 10); color: white; z-index:99; font-weight:250; margin-left:1rem;">
                            Umay Feeder Otomatik Balık <br>Yemleme Cihazı</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img id="modalImage" src="" alt="umay foto" style="width:100%">
            </div>
        </div>
    </div>
</div>

<script>
    function changeImage(src) {
        document.getElementById('modalImage').src = src;
    }
</script>
@include('layouts.footer')
