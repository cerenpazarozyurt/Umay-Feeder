@include('layouts.head')
@include('layouts.navbar')

<div>
    <div>
        <img src="{{ asset('asset/image/blogdetay.png') }}" alt="" style="width: 100%; height: 100%;">

        <div
            style="position: absolute; top: 50%; left: 50%; font-size: 3rem; font-weight: 170; transform: translate(-100%, -30%);">
            <p class="text-light"> Umay Kedi/Köpek Otomatik <br> Mama Sistemi </p>
        </div>
    </div>
</div>

<div class="container mb-3">
    <div class="mt-4 ml-3">
        <h3>Lorem Ipsum</h3>
    </div>

    <div class="row pt-4">
        <div class="col-6">
            <img src="{{ asset('asset/image/photo27.png') }}" alt="" width="100%;">
        </div>

        <div class="col-6">
            <h5>Lorem Ipsum</h5>
            <p style="font-size: 80%;"> t is a long established fact that a reader will be distracted by the readable content of a page when
                looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
                of letters, as opposed to using 'Content here, content here', making it look like readable English. Many
                desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a
                search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have
                evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
            </p>
            <p style="font-size: 80%;">
                t is a long established fact that a reader will be distracted by the readable content of a page when
                looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
                of letters, as opposed to using 'Content here, content here', making it look like readable English. Many
                desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a
                search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have
                evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
            </p>

            <div style="padding-top:1.8rem; "> <button type="button" class="btn btn-dark rounded-0" style="font-size: 1.2rem";> 
                <i class="fa-solid fa-chevron-right"></i> <span style="font-weight: 300; font-size:90%; margin-left:0.5rem" 300;> İncele </span></button></div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 7rem;">
    <div class="col-6">
        <div class="row">
            <div class="col-6" style="margin: 0rem; padding:0rem;"> <img src="{{asset('asset/image/photo28.png')}}" alt="" style="width: 100%;"></div>
            <div class="col-6" style="margin: 0rem; padding:0rem;"> <img src="{{asset('asset/image/photo29.png')}}" alt="" style="width: 100%;"></div>
            <div class="col-12" style="margin: 0rem; padding:0rem;"> <img src="{{asset('asset/image/photo30.png')}}" alt="" style="width: 100%;"></div>
        </div>
    </div>

    <div class="col-6">
        <div class="row">
            <div class="col-12" style="margin: 0rem; padding:0rem;"> <img src="{{asset('asset/image/photo31.png')}}" alt="" style="width: 100%;"></div>
            <div class="col-6" style="margin: 0rem; padding:0rem;"> <img src="{{asset('asset/image/photo32.png')}}" alt="" style="width: 100%;"></div>
            <div class="col-6" style="margin: 0rem; padding:0rem;"> <img src="{{asset('asset/image/photo33.png')}}" alt="" style="width: 100%;"></div>
        </div>
    </div>
</div>

<div class="container" style="margin-left: 9.1rem; margin-top:7rem;"> <h3> Blog </h3></div>

<div class="container" style="margin-top: 1rem !important; margin-bottom: 5rem !important;">
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
