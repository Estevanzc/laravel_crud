<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $cart = session("user_cart");
        return view("products/cart/index", [
            "cart" => $cart,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product) {
        $cart = session("user_cart", []);
        $cart[] = $product->attributesToArray();
        session()->put("user_cart", $cart);
        return redirect()->route("cart.index");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) {
        $cart = session("user_cart", []);
        foreach ($cart as $idx => $item) {
            if ($item["id"] == $product->id) {
                unset($cart[$idx]);
                break;
            }
        }
        $cart = array_values($cart);
        session()->put("user_cart", $cart);
        return redirect()->route("cart.index");
    }
}
