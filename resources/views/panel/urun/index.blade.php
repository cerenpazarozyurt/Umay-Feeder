@include('panel.layouts.header')

<div class="py-12">
    <div class="d-flex justify-content-center align-items-center"
        style="background-color: #272727 !important; margin-top:3rem;">
        <div class="card-body bg-light" style="margin: 1rem; border-radius: 1rem;">

            <div class="text-right mb-3" style="color:white">
                <a href="{{ url('panel/urun/create') }}" method="get" class="btn btn-success"
                    style="background-color: #272727;">Ürün Ekle</a>
            </div>

            <p class="text-dark" style="font-family: Raleway; font-weight">

                <strong>
                    @if (\Session::has('message'))
                        {{ \Session::get('message') }}
                    @endif
                </strong>
            </p>

            <table class="table" style="color:white">
                <thead>
                    <tr>
                        <th scope="col" style=color:black;>#</th>
                        <th scope="col" style=color:black;>İsim</th>
                        <th scope="col" style=color:black;>Fiyat</th>
                        <th scope="col" style="width: 5%; color:black;">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($urun->reverse() as $key => $value)
                        <tr style=color:black;>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $value->name }}</td>
                            <td>{!! $value->price !!}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-bars"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ url('panel/urun/edit/' . $value->id) }}">Düzenle</a>
                                        <!-- Silme Butonu -->
                                        <a class="dropdown-item sil-btn" href="#" data-id="{{ $value->id }}"
                                            onclick="deleteUrun('{{ url('panel/urun/delete/' . $value->id) }}')">Sil</a>

                                        <script>
                                            var confirmDelete;

                                            function deleteUrun(url) {
                                                // Silme modalını aç
                                                $('#deleteUrunModal').modal('show');

                                                confirmDelete = function(url) {
                                                    window.location.href = url;
                                                };
                                            }
                                        </script>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Silme Modalı -->
<div class="modal fade" id="deleteUrunModal" tabindex="-1" aria-labelledby="deleteUrunModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUrunModalLabel">
                    Ürünü Sil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Silmek istediğinize emin misiniz?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                <!-- Onaylama butonu -->
                <a href="" class="btn btn-danger sil-onay">Evet,
                    Sil</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<script>
    $('.sil-btn').on("click", function() {
        var id = $(this).attr("data-id");

        $(".sil-onay").attr('href', "/panel/urun/delete/" + id);

    });
</script>

@include('panel.layouts.footer')
