<div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
            <button class="btn btn-primary"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-shopping-cart"></i> Carrito
                @if(session('cart'))
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    @php($sumProducts = 0)
                    @foreach(session('cart') as $cartProduct)
                        @php($sumProducts += $cartProduct['quantity'])
                    @endforeach
                    {{ $sumProducts }}
                    <span class="visually-hidden">Products</span>
                  </span>
                @endif
            </button>
            <div class="dropdown-menu dropdown-menu-end p-5" style="min-width:30vw;" aria-labelledby="navbarDropdown">
                <h5>Resumen de su pedido:</h5>
                <div class="row">
                    @if(session('cart'))
                        @php($total = 0)
                        <ul class="col-12">
                            @foreach(session('cart') as $cartProduct)
                                <li class="row border-bottom">
                                    <div class="col-2 text-center my-auto">
                                        <img src="{{ asset('img') }}/{{ $cartProduct['image'] }} " class="img-fluid w-50" alt="{{ str_replace(' ', '_', $product->name) }}_image">
                                    </div>
                                    <div class="col my-auto">
                                        {{ $cartProduct['name'] }}<br>
                                        <span class="text-info">{{ $cartProduct['price'] }} €</span>
                                    </div>
                                    <div class="col-4 my-auto p-3">
                                        <div class="row">
                                            <div class="col">
                                                <button class="btn btn-sm btn-outline-info"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                            </div>
                                            <div class="col text-center">
                                                <span class="align-middle p-2">{{ $cartProduct['quantity'] }}</span>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-sm btn-outline-info"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col">
                                                <button class="btn btn-sm btn-outline-danger w-100"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @php($total += $cartProduct['price'] * $cartProduct['quantity'])
                            @endforeach
                        </ul>
                        <div class="col mt-3">
                            <div class="text-uppercase h3 fw-bold d-flex justify-content-between">
                                <span>Total pedido: </span>
                                <span>{{ $total }} €</span>
                            </div>
                        </div>
                    @else
                        <p>Su carrito está vacio, prueba a añadir items</p>
                    @endif

                </div>
            </div>
        </li>
    </ul>
</div>
