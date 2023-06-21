@extends('layout')

@section('title')
    Shop
@endsection

@section('content')
    <div class="row">
        @foreach($products as $product)
            <div class="col-xs-12 col-sm-6 col-md-4 mt-3 d-flex align-items-stretch justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('img') }}/{{ $product->image }} " class="card-img-top p-5 img-fluid" alt="{{ str_replace(' ', '_', $product->name) }}_image">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="fw-bold h5 text-info">{{ number_format($product->price, 2) }} €</p>
                        <a href="{{ route('addCartItemWeb', $product->id) }}" class="btn btn-dark mt-auto">Añadir al carrito</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('styles')
    .card-img-top {
        width: 100% !important;
        height: 100% !important;
        object-fit: contain;
    }
@endsection
