@include('panel.layouts.header')


<div class="container mt-3">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <b>
                Kullanıcılar
            </b>

            <a href="{{ url('panel/user/create') }}" class="btn btn-primary" data-toggle="modal"
                data-target="#exampleModal">Parola Değiştir</a>


        </div>
        <div class="card-body">
            @if (\Session::has('message'))
                <div class="alert alert-primary" role="alert">
                    {{ \Session::get('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    İsim - Mail Güncelle
                </div>
                <div class="card-body">
                    <p class="text-dark" style="font-family: Raleway; font-weight">
                        <strong>

                            <form action="{{ url('panel/user/update/' . $user->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <label for="isim">İsim</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ $user->name }}">
                                    </div>
                                    <div class="col-6">
                                        <label for="mail">Mail</label>
                                        <input type="text" class="form-control" name="mail" id="mail"
                                            value="{{ $user->email }}">
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mt-3">Güncelle</button>
                                    </div>
                                </div>
                            </form>

                        </strong>
                    </p>

                </div>
            </div>

        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Parola Değiştir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('panel/user/password/' . $user->id) }}" method="post">
                @csrf

                <div class="modal-body">
                    <label for="password">Yeni Parola</label>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Yeni Parola">
                    <label for="passwordAgain" class="mt-3">Yeni Parola Tekrar</label>
                    <input type="password" name="passwordAgain" id="passwordAgain" class="form-control"
                        placeholder="Yeni Parola Tekrar">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</div>
