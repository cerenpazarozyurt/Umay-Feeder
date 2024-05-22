@include('layouts.head')
@include('layouts.navbar')

<!--
class="container-fluid" tam ekran olması için
flex-row:
justify-content-start sola yaslar
justify-content-center ortalar
justify-content-end sağa yaslar

align-items-star yukarı yaslar
align-items-center ortalar
align-items-end aşağı yaslar

flex-column:
justify-content-start yukarı yaslar
justify-content-center ortalar
justify-content-end aşağı yaslar

align-items-star sola yaslar
align-items-center ortalar
align-items-end sağa yaslar

flex-row yatay işlemler için
flex-column dikey işlemler için 

divi büyütmek için 70 vh verildi dive verilen 70 vh içindekilerede verilerek eşitlendi.
-->

<div style="background-color: black; margin-top: 4rem;" class="container-fluid">
    <div class="row">
        <div class="col-8 d-flex flex-column align-items-start justify-content-end">
            <p class="text-light" style="font-size: 45px; font-weight: 300; padding-left:7rem; margin-bottom:0px !important;">Umay
                Nedir?</p>
            <p class="text-light pb-3" style="padding-left:7rem; padding-bottom: 1rem;">Umay Feeder</p>
        </div>

        <div class="col-4 d-flex justify-content-center align-items-center">
            <img src="{{ asset('asset/image/umaynedir.png') }}" alt="" style="width: 100%;">
        </div>
    </div>
</div>

<div class="container-fluid d-flex justify-content-center align-items-center">
    <img src="{{ asset('asset/image/photo20.png') }}" alt=""
        style="width: 40px; margin-top:1rem; margin-bottom:1rem;">
</div>


<!--resim ve yazı arasına siyahlık eklemek için bunu style ekleyebiliriz. box-shadow: inset 0 0 0 2000px rgba(0,0,0,0.5); -->
<div style="background-image: url({{ asset('asset/image/photo21.png') }}); background-size: cover; box-shadow: inset 0 0 0 2000px rgb(0 0 0 / 78%);"
    class="container-fluid">
    <div class="row" style="padding-bottom: 10rem; padding-top:10rem;">
        <div class="col-6" style="margin-left:5rem; margin-top:3rem; margin-bottom:3rem;">
            <h4 class="text-light" style="font-weight: 200; font-size:70px;">Kinship, in two words -
                Porsche & Golf.</h4>
            <p class="text-light pt-3" style="font-weight: 90;">
                The racing line is calculated exactly, almost as if painted on the track, nothing is left to chance. At
                the first
                moment, one needs immediate power to kick in and then inconceivable precision at the next. At the same
                time,
                the finely tuned technique exudes an aestheticism that is hard to overlook. Whether one is talking about
                Porsche
                or golf? Both.
            </p>
            <p class="text-light"style="font-weight: 90;">
                Kinship - the word to describe the mindset of Porsche & Golf. Use the power of the idea to achieve the
                apparently
                impossible; be fully aware of one's history but simultaneously keep giving one's all. With every new
                shot, with
                every new Porsche model. The thing that fits a sport with such a long history is also one of Porsche's
                distinguishing features - staying true to oneself.
            </p>
            <p class="text-light" style="font-weight: 90;">
                TFrom international professional golf tournaments like the Porsche European Open to the Porsche Golf Cup
                -
                experience the things that distinguish Porsche & Golf and the stories common to Porsche and the game of
                golf.
            </p>

        </div>

        <div class="col-6"></div>
    </div>

</div>

<div style="background-image: url({{ asset('asset/image/photo22.png') }}); background-size: cover; box-shadow: inset 0 0 0 2000px rgb(0 0 0 / 78%);"
    class="container-fluid">

    <div class="row" style="padding-bottom: 10rem; padding-top:10rem;">
        <div class="col-6"></div>
        <div class="col-6 text-right" style="padding-right:5rem; padding-top:3rem; padding-bottom:3rem;">
            <h4 class="text-light" style="font-weight: 200; font-size:70px;">Kinship, in two words -
                Porsche & Golf.</h4>
            <p class="text-light pt-3" style="font-weight: 90;">
                The racing line is calculated exactly, almost as if painted on the track, nothing is left to chance. At
                the first
                moment, one needs immediate power to kick in and then inconceivable precision at the next. At the same
                time,
                the finely tuned technique exudes an aestheticism that is hard to overlook. Whether one is talking about
                Porsche
                or golf? Both.
            </p>
            <p class="text-light"style="font-weight: 90;">
                Kinship - the word to describe the mindset of Porsche & Golf. Use the power of the idea to achieve the
                apparently
                impossible; be fully aware of one's history but simultaneously keep giving one's all. With every new
                shot, with
                every new Porsche model. The thing that fits a sport with such a long history is also one of Porsche's
                distinguishing features - staying true to oneself.
            </p>
            <p class="text-light" style="font-weight: 90;">
                TFrom international professional golf tournaments like the Porsche European Open to the Porsche Golf Cup
                -
                experience the things that distinguish Porsche & Golf and the stories common to Porsche and the game of
                golf.
            </p>
        </div>
    </div>
</div>

<div style="background-image: url({{ asset('asset/image/photo23.png') }}); backgraund-size: cover; box-shadow: inset 0 0 0 2000px rgb(0 0 0 / 78%);"
    class="container-fluid">
    <div class="row" style="padding-bottom: 10rem; padding-top:10rem;">
        <div class="col-6" style="margin-left:5rem; margin-top:3rem; margin-bottom:3rem;">
            <h4 class="text-light" style="font-weight: 200; font-size:70px;">Kinship, in two words -
                Porsche & Golf.</h4>
            <p class="text-light pt-3" style="font-weight: 90;">
                The racing line is calculated exactly, almost as if painted on the track, nothing is left to chance. At
                the first
                moment, one needs immediate power to kick in and then inconceivable precision at the next. At the same
                time,
                the finely tuned technique exudes an aestheticism that is hard to overlook. Whether one is talking about
                Porsche
                or golf? Both.
            </p>
            <p class="text-light"style="font-weight: 90;">
                Kinship - the word to describe the mindset of Porsche & Golf. Use the power of the idea to achieve the
                apparently
                impossible; be fully aware of one's history but simultaneously keep giving one's all. With every new
                shot, with
                every new Porsche model. The thing that fits a sport with such a long history is also one of Porsche's
                distinguishing features - staying true to oneself.
            </p>
            <p class="text-light" style="font-weight: 90;">
                TFrom international professional golf tournaments like the Porsche European Open to the Porsche Golf Cup
                -
                experience the things that distinguish Porsche & Golf and the stories common to Porsche and the game of
                golf.
            </p>
        </div>

        <div class="col-6"></div>

    </div>
</div>



@include('layouts.footer')
