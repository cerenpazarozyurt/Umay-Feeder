@include('layouts.head')
@include('layouts.navbar')

<div class="container"
    style="margin-top: 120px; margin-bottom: 50px; display: flex; flex-direction: column; align-items: center; justify-content: center;">

    <div class="col-md-6" style="margin-bottom: 50px;">
        <h3 style="margin-bottom:20px;">Kişisel Bilgiler</h3>

        <form method="POST" action="{{ route('panel.user.update', ['id' => Auth::user()->id]) }}">
            @csrf
            
            <input type="hidden" name="il" value="{{ Auth::user()->il }}">
            <input type="hidden" id="ilce" name="ilce" class="form-control" value="{{ Auth::user()->ilce }}" required>
            <input type="hidden" id="mahalle" name="mahalle" class="form-control" value="{{ Auth::user()->mahalle }}" required>
            <input type="hidden" name="adres" value="{{ Auth::user()->adres }}">
            <input type="hidden" id="posta_kodu" name="posta_kodu" class="form-control" value="{{ Auth::user()->posta_kodu }}" required>

            <div class="form-group">
                <label for="name">Ad</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">E-posta</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Telefon Numarası</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
            </div>

            <div class="form-group">
                <label for="tc">TC Kimlik Numarası</label>
                <input type="text" class="form-control" id="tc" name="tc" value="{{ Auth::user()->tc }}" pattern="\d{11}" title="TC Kimlik numarası 11 haneli olmalıdır." required>
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top:5px;">Bilgileri Güncelle</button>
        </form>
    </div>

    <div class="col-md-6" style="margin-bottom: 50px;">
        <h3 style="margin-bottom:20px;">Şifre Güncelleme</h3>

        <form method="POST" action="{{ route('panel.user.password', ['id' => Auth::user()->id]) }}">
            @csrf
            <div class="form-group">
                <label for="current_password">Mevcut Şifre</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
            </div>

            <div class="form-group">
                <label for="new_password">Yeni Şifre</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Şifreyi Güncelle</button>
        </form>
    </div>

    <div class="col-md-6" style="margin-bottom: 50px;">
        <h3 style="margin-bottom:20px;">Adreslerim</h3>

        <form method="POST" action="{{ route('panel.user.update', ['id' => Auth::user()->id]) }}">
            @csrf

            <input type="hidden" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
            <input type="hidden" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
            <input type="hidden" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
            <input type="hidden" class="form-control" id="tc" name="tc" value="{{ Auth::user()->tc }}" pattern="\d{11}" title="TC Kimlik numarası 11 haneli olmalıdır." required>

            <div class="form-group">
                <label for="il">İl</label>
                <select id="il" name="il" class="form-control" required>
                    <option value="0">------</option>
                    <option value="1" {{ Auth::user()->il == "Adana" ? "selected" : "" }}>Adana</option>
                    <option value="2" {{ Auth::user()->il == "Adıyaman" ? "selected" : "" }}>Adıyaman</option>
                    <option value="3" {{ Auth::user()->il == "Afyonkarahisar" ? "selected" : "" }}>Afyonkarahisar</option>
                    <option value="4" {{ Auth::user()->il == "Ağrı" ? "selected" : "" }}>Ağrı</option>
                    <option value="5" {{ Auth::user()->il == "Amasya" ? "selected" : "" }}>Amasya</option>
                    <option value="6" {{ Auth::user()->il == "Ankara" ? "selected" : "" }}>Ankara</option>
                    <option value="7" {{ Auth::user()->il == "Antalya" ? "selected" : "" }}>Antalya</option>
                    <option value="8" {{ Auth::user()->il == "Artvin" ? "selected" : "" }}>Artvin</option>
                    <option value="9" {{ Auth::user()->il == "Aydın" ? "selected" : "" }}>Aydın</option>
                    <option value="10" {{ Auth::user()->il == "Balıkesir" ? "selected" : "" }}>Balıkesir</option>
                    <option value="11" {{ Auth::user()->il == "Bilecik" ? "selected" : "" }}>Bilecik</option>
                    <option value="12" {{ Auth::user()->il == "Bingöl" ? "selected" : "" }}>Bingöl</option>
                    <option value="13" {{ Auth::user()->il == "Bitlis" ? "selected" : "" }}>Bitlis</option>
                    <option value="14" {{ Auth::user()->il == "Bolu" ? "selected" : "" }}>Bolu</option>
                    <option value="15" {{ Auth::user()->il == "Burdur" ? "selected" : "" }}>Burdur</option>
                    <option value="16" {{ Auth::user()->il == "Bursa" ? "selected" : "" }}>Bursa</option>
                    <option value="17" {{ Auth::user()->il == "Çanakkale" ? "selected" : "" }}>Çanakkale</option>
                    <option value="18" {{ Auth::user()->il == "Çankırı" ? "selected" : "" }}>Çankırı</option>
                    <option value="19" {{ Auth::user()->il == "Çorum" ? "selected" : "" }}>Çorum</option>
                    <option value="20" {{ Auth::user()->il == "Denizli" ? "selected" : "" }}>Denizli</option>
                    <option value="21" {{ Auth::user()->il == "Diyarbakır" ? "selected" : "" }}>Diyarbakır</option>
                    <option value="22" {{ Auth::user()->il == "Edirne" ? "selected" : "" }}>Edirne</option>
                    <option value="23" {{ Auth::user()->il == "Elazığ" ? "selected" : "" }}>Elazığ</option>
                    <option value="24" {{ Auth::user()->il == "Erzincan" ? "selected" : "" }}>Erzincan</option>
                    <option value="25" {{ Auth::user()->il == "Erzurum" ? "selected" : "" }}>Erzurum</option>
                    <option value="26" {{ Auth::user()->il == "Eskişehir" ? "selected" : "" }}>Eskişehir</option>
                    <option value="27" {{ Auth::user()->il == "Gaziantep" ? "selected" : "" }}>Gaziantep</option>
                    <option value="28" {{ Auth::user()->il == "Giresun" ? "selected" : "" }}>Giresun</option>
                    <option value="29" {{ Auth::user()->il == "Gümüşhane" ? "selected" : "" }}>Gümüşhane</option>
                    <option value="30" {{ Auth::user()->il == "Hakkâri" ? "selected" : "" }}>Hakkâri</option>
                    <option value="31" {{ Auth::user()->il == "Hatay" ? "selected" : "" }}>Hatay</option>
                    <option value="32" {{ Auth::user()->il == "Isparta" ? "selected" : "" }}>Isparta</option>
                    <option value="33" {{ Auth::user()->il == "Mersin" ? "selected" : "" }}>Mersin</option>
                    <option value="34" {{ Auth::user()->il == "İstanbul" ? "selected" : "" }}>İstanbul</option>
                    <option value="35" {{ Auth::user()->il == "İzmir" ? "selected" : "" }}>İzmir</option>
                    <option value="36" {{ Auth::user()->il == "Kars" ? "selected" : "" }}>Kars</option>
                    <option value="37" {{ Auth::user()->il == "Kastamonu" ? "selected" : "" }}>Kastamonu</option>
                    <option value="38" {{ Auth::user()->il == "Kayseri" ? "selected" : "" }}>Kayseri</option>
                    <option value="39" {{ Auth::user()->il == "Kırklareli" ? "selected" : "" }}>Kırklareli</option>
                    <option value="40" {{ Auth::user()->il == "Kırşehir" ? "selected" : "" }}>Kırşehir</option>
                    <option value="41" {{ Auth::user()->il == "Kocaeli" ? "selected" : "" }}>Kocaeli</option>
                    <option value="42" {{ Auth::user()->il == "Konya" ? "selected" : "" }}>Konya</option>
                    <option value="43" {{ Auth::user()->il == "Kütahya" ? "selected" : "" }}>Kütahya</option>
                    <option value="44" {{ Auth::user()->il == "Malatya" ? "selected" : "" }}>Malatya</option>
                    <option value="45" {{ Auth::user()->il == "Manisa" ? "selected" : "" }}>Manisa</option>
                    <option value="46" {{ Auth::user()->il == "Kahramanmaraş" ? "selected" : "" }}>Kahramanmaraş</option>
                    <option value="47" {{ Auth::user()->il == "Mardin" ? "selected" : "" }}>Mardin</option>
                    <option value="48" {{ Auth::user()->il == "Muğla" ? "selected" : "" }}>Muğla</option>
                    <option value="49" {{ Auth::user()->il == "Muş" ? "selected" : "" }}>Muş</option>
                    <option value="50" {{ Auth::user()->il == "Nevşehir" ? "selected" : "" }}>Nevşehir</option>
                    <option value="51" {{ Auth::user()->il == "Niğde" ? "selected" : "" }}>Niğde</option>
                    <option value="52" {{ Auth::user()->il == "Ordu" ? "selected" : "" }}>Ordu</option>
                    <option value="53" {{ Auth::user()->il == "Rize" ? "selected" : "" }}>Rize</option>
                    <option value="54" {{ Auth::user()->il == "Sakarya" ? "selected" : "" }}>Sakarya</option>
                    <option value="55" {{ Auth::user()->il == "Samsun" ? "selected" : "" }}>Samsun</option>
                    <option value="56" {{ Auth::user()->il == "Siirt" ? "selected" : "" }}>Siirt</option>
                    <option value="57" {{ Auth::user()->il == "Sinop" ? "selected" : "" }}>Sinop</option>
                    <option value="58" {{ Auth::user()->il == "Sivas" ? "selected" : "" }}>Sivas</option>
                    <option value="59" {{ Auth::user()->il == "Tekirdağ" ? "selected" : "" }}>Tekirdağ</option>
                    <option value="60" {{ Auth::user()->il == "Tokat" ? "selected" : "" }}>Tokat</option>
                    <option value="61" {{ Auth::user()->il == "Trabzon" ? "selected" : "" }}>Trabzon</option>
                    <option value="62" {{ Auth::user()->il == "Tunceli" ? "selected" : "" }}>Tunceli</option>
                    <option value="63" {{ Auth::user()->il == "Şanlıurfa" ? "selected" : "" }}>Şanlıurfa</option>
                    <option value="64" {{ Auth::user()->il == "Uşak" ? "selected" : "" }}>Uşak</option>
                    <option value="65" {{ Auth::user()->il == "Van" ? "selected" : "" }}>Van</option>
                    <option value="66" {{ Auth::user()->il == "Yozgat" ? "selected" : "" }}>Yozgat</option>
                    <option value="67" {{ Auth::user()->il == "Zonguldak" ? "selected" : "" }}>Zonguldak</option>
                    <option value="68" {{ Auth::user()->il == "Aksaray" ? "selected" : "" }}>Aksaray</option>
                    <option value="69" {{ Auth::user()->il == "Bayburt" ? "selected" : "" }}>Bayburt</option>
                    <option value="70" {{ Auth::user()->il == "Karaman" ? "selected" : "" }}>Karaman</option>
                    <option value="71" {{ Auth::user()->il == "Kırıkkale" ? "selected" : "" }}>Kırıkkale</option>
                    <option value="72" {{ Auth::user()->il == "Batman" ? "selected" : "" }}>Batman</option>
                    <option value="73" {{ Auth::user()->il == "Şırnak" ? "selected" : "" }}>Şırnak</option>
                    <option value="74" {{ Auth::user()->il == "Bartın" ? "selected" : "" }}>Bartın</option>
                    <option value="75" {{ Auth::user()->il == "Ardahan" ? "selected" : "" }}>Ardahan</option>
                    <option value="76" {{ Auth::user()->il == "Iğdır" ? "selected" : "" }}>Iğdır</option>
                    <option value="77" {{ Auth::user()->il == "Yalova" ? "selected" : "" }}>Yalova</option>
                    <option value="78" {{ Auth::user()->il == "Karabük" ? "selected" : "" }}>Karabük</option>
                    <option value="79" {{ Auth::user()->il == "Kilis" ? "selected" : "" }}>Kilis</option>
                    <option value="80" {{ Auth::user()->il == "Osmaniye" ? "selected" : "" }}>Osmaniye</option>
                    <option value="81" {{ Auth::user()->il == "Düzce" ? "selected" : "" }}>Düzce</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ilce">İlçe</label>
                <input type="text" id="ilce" name="ilce" class="form-control" value="{{ Auth::user()->ilce }}" required>
            </div>

            <div class="form-group">
                <label for="mahalle">Mahalle</label>
                <input type="text" id="mahalle" name="mahalle" class="form-control" value="{{ Auth::user()->mahalle }}" required>
            </div>

            <div class="form-group">
                <label for="adres">Adres</label>
                <textarea class="form-control" id="adres" name="adres" rows="3" required>{{ Auth::user()->adres }}</textarea>
            </div>

            <div class="form-group">
                <label for="posta_kodu">Posta Kodu</label>
                <input type="text" id="posta_kodu" name="posta_kodu" class="form-control" value="{{ Auth::user()->posta_kodu }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Adresi Güncelle</button>
        </form>
    </div>
</div>

@include('layouts.footer')
