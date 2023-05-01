<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with("products", $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeFromCartCheckout($id) {
        $cart = session()->get("cart"); 
        unset($cart[$id]); 
        $totalPrice = 0;
        if(!empty($cart)) {
            foreach ($cart as $item) {
                $totalPrice += $item["price"] * $item["quantity"];
            }
        }
        session()->put("cart", $cart);
        session()->put("totalprice", $totalPrice); 
        return  redirect()->back();
    }
    
    public function removeFromCart($id)
    {
        $cart = session()->get("cart"); 
        unset($cart[$id]); 
        $totalPrice = 0;
        if(!empty($cart)) {
            foreach ($cart as $item) {
                $totalPrice += $item["price"] * $item["quantity"];
            }
        }
        session()->put("cart", $cart);
        session()->put("totalprice", $totalPrice); 
        $response = [
            "cart" => session("cart"),
            "totalPrice" => $totalPrice
        ]; 
        return  Response()->json($response, 200);  
    }

    public function addToCart($id) {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(!isset($cart[$id])){
            $cart[$id] = [
                "id" => $product->id, 
                "product_name" => $product->name,
                "description" => $product->description, 
                "picture" => $product->picture,
                "price" => $product->price,
                "quantity" => 1,
                "stock" => $product->available
            ];
        } else if ($cart[$id]["quantity"] < $product->available) {
            $cart[$id]["quantity"]++; 
        } 
        $totalPrice = 0;
        if(!empty($cart)) {
            foreach ($cart as $item) {
                $totalPrice += $item["price"] * $item["quantity"];
            }
        }
        session()->put("cart", $cart);
        session()->put("totalprice", $totalPrice); 
        return redirect()->back()->with('success', 'Produit ajouté avec succès!');
}
}