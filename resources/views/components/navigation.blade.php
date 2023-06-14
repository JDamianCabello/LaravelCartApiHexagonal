<nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 fixed-top">

    <div class="container">
        <a href="{{ route('shop') }}" class="navbar-brand">JDamianCabello</a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    {{-- Cart component --}}
    @include('components/cart')
    </div>
</nav>
