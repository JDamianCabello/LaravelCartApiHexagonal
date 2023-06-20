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
        $product = Product::findOrFail($productID);

        $cart = session()->get('cart', []);

        if(isset($cart[$productID])){
            $cart[$productID]['quantity']++;
        }else{
            $cart[$productID] = [
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }
}
