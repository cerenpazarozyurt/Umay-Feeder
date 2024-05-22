@include('panel.layouts.header')

<div class="py-12">
    <div class="d-flex justify-content-center align-items-center"
        style="background-color: #272727 !important; margin-top:3rem;">
        <div class="card-body bg-light" style="margin: 1rem; border-radius: 1rem;">

            <p class="text-dark" style="font-family: Raleway; font-weight">
                    
                <strong>
                    @if (\Session::has('message'))
                        {{ \Session::get('message') }}
                    @endif
                </strong>
            </p>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">İsim</th>
                        <th scope="col">Mail</th>
                        <th scope="col" style="width: 5%">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @if(Auth::user()->id == '2') --}}
                    {{-- {{Auth::user()}} --}}
                    @foreach($users as $key => $user)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-bars"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="{{ url('panel/user/edit/' . $user->id) }}">Düzenle</a>
                                    <!-- Silme Butonu -->
                                    <a class="dropdown-item sil-btn" href="#"
                                        data-id="{{ $user->id }}"
                                        onclick="deleteUser('{{ url('panel/user/delete/' . $user->id) }}')">Sil</a>

                                    <script>
                                        
                                        var confirmDelete;

                                        function deleteUser(url) {
                                            // Silme modalını aç
                                            $('#deleteUserModal').modal('show');

                                        
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

                    {{-- @else
                    <tr>
                        <th scope="row">{{ Auth::user()->id }}</th>
                        <td>{{ Auth::user()->name}}</td>
                        <td>{{ Auth::user()->email}}</td>
                        <td>
                            <a href="{{ url('panel/user/edit/'.Auth::user()->id) }}" class="btn btn-primary">Düzenle</a>
                            <a href="{{ url('panel/user/delete-user/'.Auth::user()->id) }}" class="btn btn-danger">Sil</a>
                        </td>
                    </tr>
                    @endif --}}
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Silme Modalı -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteUserModalLabel">
                Kullanıcıyı Sil</h5>
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

$(".sil-onay").attr('href', "/panel/user/delete/" + id);

});
</script>
@include('panel.layouts.footer')