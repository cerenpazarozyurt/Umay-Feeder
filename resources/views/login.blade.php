<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<div class="d-flex justify-content-center align-items-center" style="height:100vh; background-color: #E5E3DF !important;">
    <div class="card" style="width: 25rem; background-color: #272727; border-radius: 1rem;">
        <h1 class="text-center text-light" style="font-family: Raleway; font-weight: bold; padding:5rem;">
            LOGIN
        </h1>
        <div class="card-body bg-light" style="margin: 1rem; border-radius: 1rem;">
            @if (session()->has('login'))
                {{ session('login') }}
            @endif
            @if (session()->has('register'))
                {{ session('register') }}
            @endif

            @guest

                <form action="{{ route('login') }}" method="POST">
                    @csrf
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

                    <div class="row mt-2 mb-2">
                        <div class="col-6 d-flex align-items-center">
                            <input class="mr-2" type="checkbox" name="remember_me" id="remember_me">
                            Remember Me
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <button type="submit" class="btn text-right text-decoration-none text-light"
                                style="background-color:#272727">Login</button>
                        </div>
                    </div>

                    <div style="text-align: center; margin-top: 20px;">
                        <p> Henüz bir hesabınız yok mu? <br>
                            <a href="{{ url('/register') }}">Register</a>
                        </p>
                    </div>
                </form>
            @endguest

            @auth
                <a href="{{ route('logout') }}">Logout</a>
            @endauth

        </div>
    </div>
</div>
