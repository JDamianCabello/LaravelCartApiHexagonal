<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
        @yield('styles')
    </style>
    <title>@yield('title') - TechPump</title>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>

<body class="d-flex flex-column">
<div id="page-content">
    {{-- Navbar --}}
    <header>
        @include('components.navigation')
    </header>
    <!-- Begin page content -->
    <main role="main" class="container mt-3">
        @if(session('success'))
            <div class="alert alert-info alert-dismissible fade show alert-with-timer" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </main>
</div>

{{-- Footer --}}
@include('components.footer')

<script>
    if (document.querySelector('.alert-with-timer')) {
        document.querySelectorAll('.alert-with-timer').forEach(function($el) {
            setTimeout(() => {
                $el.classList.add('d-none');
            }, 2000);
        });
    }

    document.addEventListener("DOMContentLoaded", function(){
        /////// Prevent closing from click inside dropdown
        document.querySelectorAll('.dropdown-menu').forEach(function(element){
            element.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        })
    });
    // DOMContentLoaded  end

    @yield('js')
</script>
</body>
</html>

