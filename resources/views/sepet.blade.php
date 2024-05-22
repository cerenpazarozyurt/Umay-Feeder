@include('layouts.head')
@include('layouts.navbar')

<div class="container" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="row">
        <div class="col-md-7" style="margin-bottom: 40px;">
            <h2 style="margin-top:35px; margin-bottom: 20px;">Sepetim</h2>

            @if ($error != null)
                <div class="alert alert-warning">
                    {{ $error }}
                </div>
            @endif

            @foreach ($cartItem as $urun)
                <div class="border p-3 mb-3">
                    <div class="d-flex align-items-center mb-2" style="margin-left:10px;">
                        <img src="{{ asset('asset/image/umay_8.png') }}" alt="Ürün Fotoğrafı" class="img-thumbnail"
                            style="width: 100px; height: 100px;">
                        <div class="ml-4">
                            <h5>{{ $urun['name'] }}</h5>
                            <div class="d-flex align-items-center">

                                <form method="POST" action="{{ route('panel.sepet.remove') }}">
                                    @csrf
                                    <input type="hidden" name="urun_id" value="{{ $urun['urun_id'] }}">
                                    <input type="hidden" name="qty" value="1">
                                    <button type="submit" class="btn btn-sm btn-secondary"
                                        style="margin-top:3px;">-</button>
                                </form>

                                <input type="number" value="{{ $urun['qty'] }}" min="1"
                                    class="form-control w-25 text-center mx-2" readonly>

                                <form method="POST" action="{{ route('panel.sepet.add') }}">
                                    @csrf
                                    <input type="hidden" name="urun_id" value="{{ $urun['urun_id'] }}">
                                    <input type="hidden" name="qty" value="1">
                                    <button type="submit" class="btn btn-sm btn-secondary"
                                        style="margin-top:3px;">+</button>
                                </form>

                                <form method="POST" action="{{ route('panel.sepet.delete') }}">
                                    @csrf
                                    <input type="hidden" name="urun_id" value="{{ $urun['urun_id'] }}">
                                    <button type="submit" class="btn btn-sm btn-secondary"
                                        style="margin-top:3px; margin-left:20px;"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </form>

                            </div>
                            <p style="margin-left:2px; margin-bottom:5px;">
                                {{ Auth::user() ? $urun->getFiyat->price : $urun['price'] }}₺</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-md-5">
            <h4 style="margin-bottom: 20px; margin-top: 45px;">Sepet Özeti</h4>
            <div class="border p-3">
                <p>Toplam: {{ $totalPrice }}₺</p>
                {{-- <a href="{{ url('panel/sepet/onay') }}" class="btn btn-primary btn-block">Sepeti Onayla</a> --}}

                <form action="{{ url('odeme.index') }}" method="GET">
                    @csrf

                    @if (count($cartItem) > 0)
                        <input type="hidden" name="basket_name" value="Umay Feeder">
                        <input type="hidden" name="basket_category" value="Umay">
                        <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">

                        <button type="button" class="btn btn-primary btn-block onayla-button">Sepeti Onayla</button>
                    @else
                    @endif
                </form>
            </div>

            <div class="mt-4">
                <img src="{{ asset('asset/image/iyzico_sepet.png') }}" alt=""
                    style="width: 30%; margin-left:150px;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="iyzicoModal" tabindex="-1" role="dialog" aria-labelledby="iyzicoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="iyzicoModalLabel">Ödeme Sayfası</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- İyzico ödeme formu burada gösterilecek -->
                <div id="iyzicoFormContent"></div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $(".onayla-button").on('click', function() {

            var totalPrice = "{{ $totalPrice }}";
            var basketName = "Umay Feeder";
            var basketCategory = "Umay";

            $.ajax({
                type: "GET",
                url: '{{ route('odeme.index') }}',
                data: {
                    "totalPrice": totalPrice,
                    "basket_name": basketName,
                    "basket_category": basketCategory

                },
                success: function(data) {

                    console.log(data.paymentInput);
                    if (data.paymentInput) {
                        $('#iyzicoFormContent').html(data.paymentInput);

                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Hatası: " + status + " - " + error);
                }
            });
        });
    });
</script>

@if (session('message'))
    @if (Auth::guest())
        <script>
            Swal.fire({
                title: 'Bilgilendirme',
                text: "{{ session('message') }}",
                icon: 'info',
                confirmButtonText: 'Tamam'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('login') }}";
                }
            });
        </script>
    @elseif (Auth::check() && !Auth::user()->adres)
        <script>
            Swal.fire({
                title: 'Uyarı',
                text: "{{ session('message') }}",
                icon: 'warning',
                confirmButtonText: 'Tamam'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('profil') }}";
                }
            });
        </script>
    @else
        <script>
            Swal.fire({
                title: 'Bilgilendirme',
                text: "{{ session('message') }}",
                icon: 'info',
                confirmButtonText: 'Tamam'
            });
        </script>
    @endif
@endif
