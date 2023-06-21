<nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 fixed-top">

    <div class="container">
        <a href="#" class="navbar-brand">JDamianCabello</a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if(session('user'))
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto">
                    <li class="my-auto"><span class="text-end text-white h5">Hola, {{ session('user')['username'] }}</span></li>
                    {{-- Cart component --}}
                    @include('components/cart')
                    <li><a href="{{ route('logout') }}" class="btn btn-danger ms-3">Cerrar sesión</a></li>
                </ul>
            </div>
        @endif
    </div>
</nav>
