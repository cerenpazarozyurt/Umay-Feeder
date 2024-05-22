<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<div class="d-flex justify-content-center align-items-center" style="height:115vh; background-color: #E5E3DF !important;">
    <div class="card" style="width: 30rem; height:110vh; background-color: #272727; border-radius: 1rem;">
        <h1 class="text-center text-light" style="font-family: Raleway; font-weight: bold; padding:5rem;">
            REGISTER
        </h1>
        <div class="card-body bg-light" style="margin: 1rem; border-radius: 1rem;">
            @if (session()->has('register') && session('register') == 'fail')
                Kayıt işlemi hatalı
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="m-3">
                    <label for="first_name">
                        Name
                    </label>
                    <input class="form-control" type="text" name="name" id="name" required>
                </div>

                <div class="m-3">
                    <label for="last_name">
                        Last Name
                    </label>
                    <input class="form-control" type="text" name="last_name" id="last_name">
                </div>

                <div class="m-3">
                    <label for="email">
                        Email
                    </label>
                    <input class="form-control" type="text" name="email" id="email" required>
                </div>

                <div class="m-3">
                    <label for="password">
                        Password
                    </label>
                    <input class="form-control" type="password" name="password" id="password" required>
                </div>

                <div class="m-3">
                    <label for="password-confirm">
                        Confirm Password
                    </label>

                    <input class="form-control" type="password" name="password-confirm" id="password-confirm" required>
                </div>


                <div class="col-12 text-center">
                    <button type="submit" class="btn text-right text-decoration-none text-light"
                        style="background-color:#272727">Register</button>
                </div>


                <div style="text-align: center;">
                    <p>
                        <a href="{{ url('/login') }}">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#password-confirm').on('change', function() {
        if ($('#password').val() != $('#password-confirm').val()) {
            alert('Passwords do not match');
            $('#password-confirm').val('');
        }
    });
</script>
