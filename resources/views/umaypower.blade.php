@include('layouts.head')
@include('layouts.navbar')

<div class="container" style="margin-top: 7rem;">
    <img src="{{ asset('asset/image/photo17.png') }}" alt="" style="width: 40%; margin-left:20rem;">
</div>


<!--margin-bottom: 1rem !important; dememizin sebebi important ile  başka marginin onu ezmesini önledik-->
<div>
    <a href="#" class="btn btn-block m-auto text-align-center"
        style="background-color: transparent; border:1px solid #000000; color:#000000; width:fit-content; width: 150px; height: 40px; margin-bottom: 1rem !important; margin-top: 2rem !important;  ">Sepete
        Ekle</a>
</div>

<div class="container" style="margin-top: 5rem !important;">
    <div class="row">
        <div class="col-9">
            <h3>Umay Feeder Otomatik Balık Yemleme</h3>
            <br>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when
                looking at
                its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                as
                opposed to using 'Content here, content here', making it look like readable English.Many desktop
                publishing
                packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem
                ipsum'
                will uncover many web sites still in their infancy. Various versions have evolved over the years,
                sometimes by
                accident, sometimes on purpose (injected humour and the like).</p>
        </div>

        <div class="col-3"></div>
    </div>
</div>


<div class="container" style="margin-top: 4rem !important;">
    <div class="row">
        <div class="col-6">
            <img src="{{ asset('asset/image/photo18.png') }}" alt="" style="width: 100%; border-radius: 12px;">
        </div>

        <div class="col-6">
            <img src="{{ asset('asset/image/photo19.png') }}" alt="" style="width: 100%; border-radius: 12px;">
        </div>
    </div>
</div>

<div class="container" style="margin-top: 7rem !important; margin-bottom: 4rem !important;">
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
</div>


@include('layouts.footer')
