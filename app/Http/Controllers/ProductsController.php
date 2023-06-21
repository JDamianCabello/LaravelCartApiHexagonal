<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        if(!session()->has('user'))
        {
            return view('login');
        }
    }

    /**
     * @throws \Exception
     */
    public function index(){
        $apiResponse = $this->callApi('list-products');
        $products = collect($apiResponse['message'])->map(function ($product) {
            return (object) $product;
        });

        return view('products', compact('products'));
    }

    public function addToCart($productID){
        $apiResponse = $this->callApi('add-cart-item', 'POST', ['product_id' => $productID]);
        session()->forget('cart');
        session()->put('cart', $apiResponse["message"]["items"]);
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function deleteCartItem($productID){
        $apiResponse = $this->callApi('delete-cart-item', 'DELETE', ['product_id' => $productID]);
        session()->forget('cart');
        session()->put('cart', $apiResponse["message"]["items"]);
        return redirect()->back()->with('success', 'Product deleted from cart!');
    }

    public function changeQuantityCartItem($productID){
        $apiResponse = $this->callApi('change-cart-item-quantity', 'PUT', ['product_id' => $productID, 'quantity' => -1]);
        session()->forget('cart');
        session()->put('cart', $apiResponse["message"]["items"]);
        return redirect()->back()->with('success', 'Product quantity changed!');
    }

    public function checkout(){
        $user = session()->get('user', []);
        if (!session()->exists('cart')) {
            return redirect('/home');
        }
        $apiResponse = $this->callApi('get-checkout', 'POST', ['user_id' => $user['id']]);
        $order = $apiResponse["message"];
        session()->forget('cart');
        return view('checkout', compact('order'));
    }

    private function callApi(string $routeName, string $method = 'GET', array $params = [])
    {
        $user = session()->get('user', []);
        $request = Request::create(route($routeName), $method, $params);
        $request->headers->set('Authorization', env('API_KEY'));
        $request->headers->set('authentication',  $user['jwt']);
        $response = app()->handle($request);
        $responseContent = json_decode($response->getContent(), true);
        if($responseContent['error'] && $responseContent['class'] === 'AuthException'){
            session()->forget(['user','cart']);
            return view('login')->with('error', 'Sesión expirada, inicia sesión de nuevo');
        }
        return $responseContent;
    }
}
