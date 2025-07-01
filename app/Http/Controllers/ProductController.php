<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index(Request $request) {
        $categorie = $request->query("categorie") ?? 0;
        $products = $categorie ? Product::with("categorie")->where("categorie_id", $categorie)->get() : Product::with("categorie")->get();
        return view("products.index", [
            "products" => $products,
            "categories" => Categorie::all(),
            "categorie_id" => $categorie,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request) {
        $request_data = $request->validated();
        if ($request->hasFile("photo")) {
            $path = $request->file("photo")->store('products', 'public');
            $request_data["photo"] = $path;
        }
        Product::create($request_data);
        return redirect()->route("products.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) {
        return view("products/page", [
            "product" => $product,
        ]);
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
    public function destroy(string $id)
    {
        //
    }
}
