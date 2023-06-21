@extends('layout')

@section('title')
    Shop Checkout
@endsection

@section('content')
    <h5 class="text-center mt-5">Compra realizada correctamente</h5>

    <div class="row">
        <div class="col border">
            <div class="h6">Datos de la compra:</div>
            <div class="h6">Hora: {{ $order['payed_at'] }}</div>
            <div class="h6">ID Compra: {{ $order['order_id'] }}</div>
        </div>
    </div>

    <div class="mt-5 text-center">Gracais por su compra, ¡esperamos verle pronto de nuevo!</div>
    <div class="row text-center mt-5">
        <div class="col">
            <a href="{{ route('home') }}" class="btn btn-primary text-center">Volver a la tienda</a>
        </div>
    </div>
@endsection

@section('styles')
@endsection
