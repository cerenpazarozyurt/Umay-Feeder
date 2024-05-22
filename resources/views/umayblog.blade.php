@include('layouts.head')
@include('layouts.navbar')


<div>
    <div class="container" style="position: absolute; top:50%; z-index: 99; left:10%">
        <p class="text-light" style="font-size: 3rem; font-weight: 170;">
            Umay Feeder Blog
        </p>
    </div>

    <img src="{{ asset('asset/image/blog.png') }}" alt="" style="width: 100%;">
</div>

<div style="margin-top:7rem;">
    <h3 class="text-center">Blog Yazıları</h3>
</div>

<div class="container " style="margin-top:6rem;">
    <div class="row">
        <div class="col-4" style="border:none;">
            <img class="card-img-top" src="{{ asset('asset/image/photo24.png') }}" alt="Card image cap"
                style="border-top-left-radius: 10px; border-top-right-radius: 10px;">

            <div class="card-body">
                <p class="card-text" style="font-weight: 600;">Lorem İpsum</p>
            </div>

            <div class="ml-3"><i class="fa-solid fa-chevron-right"></i>
                <span class="pl-2">İncele</span>
            </div>
            
        </div>

        <div class="col-4" style="border:none;">
            <img class="card-img-top" src="{{ asset('asset/image/photo25.png') }}" alt="Card image cap"
                style="border-top-left-radius: 10px; border-top-right-radius: 10px;">

            <div class="card-body">
                <p class="card-text" style="font-weight: 600;">Lorem İpsum</p>
            </div>

            <div class="ml-3"><i class="fa-solid fa-chevron-right"></i>
                <span class="pl-2">İncele</span>
            </div>
        </div>
        
        <div class="col-4" style="border:none;">
            <img class="card-img-top" src="{{ asset('asset/image/photo26.png') }}" alt="Card image cap"
                style="border-top-left-radius: 10px; border-top-right-radius: 10px;">

            <div class="card-body">
                <p class="card-text" style="font-weight: 600;">Lorem İpsum</p>
            </div>

            <div class="ml-3"><i class="fa-solid fa-chevron-right"></i>
                <span class="pl-2">İncele</span>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top:6rem;">
        <div class="col-4" style="border:none;">
            <img class="card-img-top" src="{{ asset('asset/image/photo24.png') }}" alt="Card image cap"
                style="border-top-left-radius: 10px; border-top-right-radius: 10px;">

            <div class="card-body">
                <p class="card-text" style="font-weight: 600;">Lorem İpsum</p>
            </div>

            <div class="ml-3"><i class="fa-solid fa-chevron-right"></i>
                <span class="pl-2">İncele</span>
            </div>
            
        </div>

        <div class="col-4" style="border:none;">
            <img class="card-img-top" src="{{ asset('asset/image/photo25.png') }}" alt="Card image cap"
                style="border-top-left-radius: 10px; border-top-right-radius: 10px;">

            <div class="card-body">
                <p class="card-text" style="font-weight: 600;">Lorem İpsum</p>
            </div>

            <div class="ml-3"><i class="fa-solid fa-chevron-right"></i> 
                <span class="pl-2">İncele</span>
            </div>
        </div>
        
        <div class="col-4" style="border:none;">
            <img class="card-img-top" src="{{ asset('asset/image/photo26.png') }}" alt="Card image cap"
                style="border-top-left-radius: 10px; border-top-right-radius: 10px;">

            <div class="card-body">
                <p class="card-text" style="font-weight: 600;">Lorem İpsum</p>
            </div>

            <div class="ml-3"><i class="fa-solid fa-chevron-right"></i>
                <span class="pl-2">İncele</span>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top:6rem; margin-bottom:6rem;">
        <div class="col-4" style="border:none;">
            <img class="card-img-top" src="{{ asset('asset/image/photo24.png') }}" alt="Card image cap"
                style="border-top-left-radius: 10px; border-top-right-radius: 10px;">

            <div class="card-body">
                <p class="card-text" style="font-weight: 600;">Lorem İpsum</p>
            </div>

            <div class="ml-3"><i class="fa-solid fa-chevron-right"></i>
                <span class="pl-2">İncele</span>
            </div>
            
        </div>

        <div class="col-4" style="border:none;">
            <img class="card-img-top" src="{{ asset('asset/image/photo25.png') }}" alt="Card image cap"
                style="border-top-left-radius: 10px; border-top-right-radius: 10px;">

            <div class="card-body">
                <p class="card-text" style="font-weight: 600;">Lorem İpsum</p>
            </div>

            <div class="ml-3"><i class="fa-solid fa-chevron-right"></i>
                <span class="pl-2">İncele</span>
            </div>
        </div>
        
        <div class="col-4" style="border:none;">
            <img class="card-img-top" src="{{ asset('asset/image/photo26.png') }}" alt="Card image cap"
                style="border-top-left-radius: 10px; border-top-right-radius: 10px;">

            <div class="card-body">
                <p class="card-text" style="font-weight: 600;">Lorem İpsum</p>
            </div>

            <div class="ml-3"><i class="fa-solid fa-chevron-right"></i> 
                <span class="pl-2">İncele</span>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
