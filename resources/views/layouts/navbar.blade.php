<style>
    .navbar-menu {
        display: none;
    }

    .navbar-menu.active {
        display: block;
    }

    a {
        text-decoration: none;
    }

    li {
        margin-bottom: 20px;
    }


    .menu-drawer {
        width: 200px;
        background-color: #272727;
        height: 900px;
        position: absolute;
        left: -550px;
        top: 0;
        transition: left linear .2s;
        padding: 50px;
        z-index: 999;
    }

    #menuText,
    #menuIcon {
        cursor: pointer;
    }


    .menu-drawer li {
        list-style: none;
        position: relative;

    }

    .menu-drawer li a {
        display: inline-block;
        vertical-align: middle;
    }

    .menu-drawer li:hover {
        background-color: rgba(255, 255, 255, 0.3);
        padding: 1px 10px 5px 10px;
        transition: none;
    }

    .menu-drawer li i.fa-solid.fa-chevron-right {
        color: #932013;
        margin-top: 13px;
    }

    .menu-drawer a {
        color: white;
        padding-right: 60px;
        margin-top: 10px;
        display: block;
        text-decoration: none;
    }

    .modal-overlay {
        position: absolute;
        right:-37px;
        text-align: left;
        color: white;
        z-index: 1000;
    }

    .modal-overlay span {
        cursor: pointer;
        color: #932013;
        font-size: 24px;
    }

    .open {
        left: 0px;
        width: 340px;
        transition: right linear .2s, width linear .2s;
    }

    .dropdown-menu.dropdown-menu-center {
        min-width: 150px;
    }

    .dropdown-menu a.dropdown-item:hover {
        background-color: transparent !important;
    }
</style>

<div class="fixed fixed-top d-flex"
    style="background: {{ Request::segment(1) == '' ? 'linear-gradient(rgba(8, 8, 8, 0.8), rgba(255, 255, 255, 0))' : 'white' }} fixed; {{ Request::segment(1) == '' ? '' : 'border-bottom: 1px solid #80808033;' }}">
    <div class="col-2 d-flex justify-content-center align-items-center p-3">
        <div id="menuIcon" class="toggle-menu">
            <i class="fa-solid fa-bars {{ Request::segment(1) == '' ? 'text-light' : 'text-dark' }} "></i>
        </div>
        <h6 id="menuText" class="{{ Request::segment(1) == '' ? 'text-light' : 'text-dark' }} ml-1 mt-2">Menü</h6>

        <div class="navbar-menu">
            <div class="menu-drawer">
                <ul style="margin-top:30px;">
                    <li class="d-flex justify-content-between align-items-center">
                        <a href="{{ url('/') }}">ANASAYFA</a>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li class="d-flex justify-content-between align-items-center">
                        <a href="{{ url('/umaynedir') }}">UMAY NEDİR?</a>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li class="d-flex justify-content-between align-items-center">
                        <a href="{{ url('/umayfeeder') }}">UMAY FEEDER</a>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li class="d-flex justify-content-between align-items-center">
                        <a href="{{ url('/umaylighter') }}">UMAY LİGHTER</a>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li class="d-flex justify-content-between align-items-center">
                        <a href="{{ url('/umaypower') }}">UMAY POWER</a>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li class="d-flex justify-content-between align-items-center">
                        <a href="{{ url('/umayblog') }}">BLOG</a>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                </ul>
            </div>

            <div id="modalOverlay" class="modal-overlay">
                <span onclick="closeModal()"><i class="fa-solid fa-xmark"></i></span>
            </div>

            <div style="position: absolute; top: 220px; right: -175px; transform: scale(0.4);">
                <img src="{{ asset('asset/image/logscadya.png') }}" alt="">
            </div>
        </div>

    </div>

    <div class="col-8 d-flex justify-content-center mb-2">
        <a href="{{url("/")}}">
        <img src="{{ Request::segment(1) == '' ? asset('asset/image/umaylogolight.png') : asset('asset/image/umaylogodark.png') }}"
            alt="">
        </a>
    </div>

    <div class="col-2 d-flex justify-content-center align-items-center p-3">
        <a href="{{ url('/sepet') }}">
            <i class="fa-solid fa-cart-shopping {{ Request::segment(1) == '' ? 'text-light' : 'text-dark' }} mr-2" style="font-size: 1.3rem"></i>
        </a>
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-user {{ Request::segment(1) == '' ? 'text-light' : 'text-dark' }}"
                    style="font-size: 1.3rem"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-center" aria-labelledby="dropdownMenuButton"
                style="background-color:#272727; z-index:999;">
                <a class="dropdown-item" style="color:white;" href="{{ url('/sepet') }}">Sepet</a>
                @if (Auth::user())
                    <a class="dropdown-item" style="color:white;" href="{{ url('/profil') }}">Profil</a>
                    <a class="dropdown-item" style="color:white;" href="{{ url('/siparislerim') }}">Siparişlerim</a>
                    <a class="dropdown-item" style="color:white;" href="{{ url('/logout') }}">Çıkış</a>
                @else
                    <a class="dropdown-item" style="color:white;" href="{{ url('/login') }}">Giriş Yap</a>
                    <a class="dropdown-item" style="color:white;" href="{{ url('/register') }}">Kayıt Ol</a>
                @endif

            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var menuIcon = document.getElementById('menuIcon');
        var navbarMenu = document.querySelector('.navbar-menu');
        var menuDrawer = document.querySelector('.menu-drawer');
        var modalOverlay = document.getElementById('modalOverlay');

        function toggleMenu() {
            navbarMenu.classList.toggle('active');
            menuDrawer.classList.toggle('open');
        }

        function closeMenu() {
            navbarMenu.classList.remove('active');
            menuDrawer.classList.remove('open');
        }

        menuIcon.addEventListener('click', toggleMenu);
        menuText.addEventListener('click', toggleMenu);
        modalOverlay.addEventListener('click', closeMenu);
    });
</script>

<!--class'a fixed fixed-top vererek navbarın yukarıya yapışık ekranı takip eden bir yapı olmasını sağladık.-->
<!--align-items-center yukarı ve aşağıdan ortalar, justify-content-center sağdan soldan ortalar-->

<!--{{-- Request::segment(1) == '' ? 'text-light' : 'text-dark' --}} eğer anasayfadaysak yazıyı açık renkli göster anasayfada değilsek koyu renkli göster anlamına geliyor. '' ? boş ise text light yani beyaz olarak göster, : 'text-dark' boş değilse ise dark olarak göster anlamına geliyor.-->
<!-- ? ise, : değilse anlamlarında -->

<!-- style="background: {{-- Request::segment(1) == '' ? 'linear-gradient(rgba(8, 8, 8, 0.8), rgba(255, 255, 255, 0))' : 'white' --}} navbar arka planının sayfaya göre siyah ve beyaz olmasını sağlar. -->

<!--{{-- Request::segment(1) == '' ? asset('asset/image/umaylogolight.png') : asset('asset/image/umaylogodark.png')  --}} sayfaya göre logo rengi değişiyor-->
