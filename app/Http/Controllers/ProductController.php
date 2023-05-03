<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Order;
use Illuminate\Support\Facades\Session;

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
        session()->get("cart", []); 
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
        $recaptcha_response = $_POST['g-recaptcha-response'];
        $secret_key = env('GOOGLE_RECAPTCHA_SECRET_KEY_SERVER');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$recaptcha_response");
        $response = json_decode($response); 
        if($response->success) {
            $orders = Order::all();
            $randid = mt_rand(999999, 99999999999999); 
            foreach ($orders as $order) {
                while ($order->order_id == $randid) {
                    $randid = mt_rand(999999, 99999999999999);
                }
            }
            $cart = session()->get("cart"); 
            $totalprice = session()->get("totalprice"); 
            $finalcart = []; 
            $index = 0; 
            foreach ($cart as $cart_item) {
            $finalcart[$index] = [
                "Id" => "Id: " . $cart_item["id"],
                "Produit" => " Produit: " . $cart_item["product_name"],
                "Prix" => " Prix: " . $cart_item["price"] . " dh",  
                "Qty" => " Quantité: " . $cart_item["quantity"]
            ]; 
            $index++; 
            }
            $finalcart[$index] = [
                "Total" => " Total: " . $totalprice . " dh"
            ]; 
            $stringArrays = array_map(function($array) {
                return implode(",", $array); 
            }, $finalcart); 
            $cartString = implode("*", $stringArrays); 
            try {
            $order = new Order();
            $order->nom_client = $request->input('lname');
            $order->prenom_client = $request->input('fname');
            $order->message = $request->input('message');
            $order->adresse_client = $request->input('address');
            $order->email_client = $request->input('email');
            $order->contact_client = $request->input('phone');
            $order->order = $cartString;
            $order->order_id = $randid;
            $order->save();
            } catch (\Exception $e) {
            session()->flash('error', 'Il y a eu une erreur lors de la soumission de votre commande, veuillez nous contacter via notre WhatsApp, numéro de téléphone ou formulaire de contact' . " Code: " . $e->getMessage());
            return back(); 
            }
            Session::forget("totalprice");
            Session::forget("cart");
            return redirect()->route("order.success");
        } else {
            session()->flash('error', 'Veuillez remplir le captcha et réessayer');
            return back(); 
        }
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
    public function decreaseQuantityCheckout($id)
    {
        $cart = session()->get("cart"); 
        if ($cart[$id]["quantity"] > 1) {
            $cart[$id]["quantity"]--; 
        }
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
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function increaseQuantityCheckout($id)
    {
        $cart = session()->get("cart"); 
        $product = Product::findOrFail($id);
        if ($cart[$id]["quantity"] < $product->available) {
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
        return  redirect()->back();
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function increaseQuantity(Request $request, $id)
    {
        $cart = session()->get("cart"); 
        $product = Product::findOrFail($id);
        if ($cart[$id]["quantity"] < $product->available) {
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
        $response = [
            "cart" => session("cart"),
            "totalPrice" => $totalPrice
        ]; 
        return  Response()->json($response, 200); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function decreaseQuantity(Request $request, $id)
    {
        $cart = session()->get("cart"); 
        if ($cart[$id]["quantity"] > 1) {
            $cart[$id]["quantity"]--; 
        }
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request 
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
/**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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