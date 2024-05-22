@include('layouts.head')
@include('layouts.navbar')

<div class="container" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="row">
        <div class="col-md-12">
            <h2 style="margin-top: 35px; margin-bottom: 20px;">Siparişlerim</h2>

            @if ($siparisler->isEmpty())
                <div class="alert alert-warning">
                    Henüz onaylanmış siparişiniz bulunmamaktadır.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ürün Adı</th>
                                <th scope="col">Adet</th>
                                <th scope="col">Fiyat</th>
                                <th scope="col">Toplam Fiyat</th>
                                <th scope="col">Durum</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siparisler as $siparis)
                                <tr>
                                    <th scope="row">{{ $siparis->id }}</th>
                                    <td>{{ $siparis->getUrun->name }}</td>
                                    <td>{{ $siparis->qty }}</td>
                                    <td>{{ $siparis->getUrun->price }}₺</td>
                                    <td>{{ number_format($siparis->qty * $siparis->getUrun->price, 2) }}₺</td>
                                    <td>
                                        <span class="badge badge-success">Onaylandı</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

@include('layouts.footer')
