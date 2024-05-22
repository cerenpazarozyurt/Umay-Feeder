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
                <form action="{{ url('panel/urun/update/' . $urun->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Ürün İsmi</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $urun->name }}">
                    </div>

                    <div class="form-group">
                        <label for="price">Ürün Fiyatı</label>
                        <input type="number" class="form-control" name="price" id="urun_fiyati" step="0.01"
                            value="{{ $urun->price }}">
                    </div>
    
                    <div class="form-group mt-3 mb-3 row">
                        <div class="col-6">
                            <label for="kapak_foto">Ürün Kapak Fotoğrafı</label>
                            <input type="file" class="form-control" name="kapak_foto" id="kapak_foto">
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <img src="{{ asset('asset/image/urun_photo') . '/' . $urun->header_img }}" alt=""
                                width="50%">
                        </div>
                    </div>

                    <div class="row mt-3 mb-3">
                        <div class="col-12">
                            <label for="images">Ürün Fotoğrafları</label>
                            <input type="file" class="form-control" name="images[]" id="images" multiple>
                        </div>
                    </div>

                    <button type="submit" class="btn text-right text-decoration-none text-light"
                        style="background-color: black;">GÖNDER</button>
                </form>

                {{-- belirli bir ürünün fotoğraflarını göstermek için --}}
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">Ürün Fotoğrafları</h3>
                    </div>
                    
                    @if ($resim->count() > 0)
                   
                        @foreach ($resim as $photo)
                        
                            <div class="col-3">
                                <form action="{{ route('deleteUrunImage', ['page' => 'urun_id', 'id' => $photo->urun_id]) }}"
                                    method="get" style="position: absolute;">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary">Resmi Sil</button>
                                </form>

                                <img src="{{ asset('asset/image/urun_photo') . '/' . $photo->photo_name }}" alt=""
                                    width="50%">
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <h3 class="text-center">Fotoğraf Bulunamadı</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    @include('panel.layouts.footer')
