@include('panel.layouts.header')
<div class="py-12">
    <div class="d-flex justify-content-center align-items-center">
        <div class="card" style="width: 75%; background-color: #272727; border-radius: 1rem;">
            <div class="card-body bg-light" style="margin: 1rem; border-radius: 1rem;">
                <p class="text-dark" style="font-family: Raleway; font-weight">
                    <strong>
                        @if (\Session::has('message'))
                            {{ \Session::get('message') }}
                        @endif
                    </strong>
                </p>
                <form action="{{ route('panel.urun.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Ürün İsmi</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>

                    <div class="form-group">
                        <label for="kapak_foto">Ürün Kapak Fotoğrafı</label>
                        <input type="file" class="form-control" name="kapak_foto" id="kapak_foto">
                    </div>

                    <div class="form-group">
                        <label for="kapak_foto">Ürün Fotoğrafları</label>
                        <input type="file" class="form-control" name="images[]" id="images" multiple>
                    </div>

                    <div class="form-group">
                        <label for="price">Ürün Fiyatı</label>
                        <input type="number" class="form-control" name="price" id="urun_fiyati" step="0.01">
                    </div>

                    <button type="submit" class="btn text-right text-decoration-none text-light"
                        style="background-color: #272727">GÖNDER</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('panel.layouts.footer')
