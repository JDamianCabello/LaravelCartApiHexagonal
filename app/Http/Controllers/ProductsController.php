<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index(){
        $request = Request::create(route('list-products'));
        $request->headers->set('Authorization', env('API_KEY'));
        $response = app()->handle($request);
        $responseBody = json_decode($response->getContent(), true);


        $products = collect($responseBody['message'])->map(function ($product) {
            return (object) $product;
        });

        return view('products', compact('products'));
    }

    public function addToCart($productID){
        $user = session()->get('user', []);

        $request = Request::create(route('add-cart-item'), 'POST', ['product_id' => $productID]);
        $request->headers->set('Authorization', env('API_KEY'));
        $request->headers->set('authentication',  $user['jwt']);
        $response = app()->handle($request);
        $responseBody = json_decode($response->getContent(), true);

        session()->forget('cart');
        session()->put('cart', $responseBody["message"]["items"]);
        return redirect()->back()->with('success', 'Product added to cart!');
    }
}
