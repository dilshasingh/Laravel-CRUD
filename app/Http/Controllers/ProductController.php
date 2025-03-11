<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return view('index',['products'=>$products]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required',
        'qty' => 'required|numeric',
        'price' => 'required|numeric',
        'description' => 'nullable',
    ]);

    
    Product::create($data);

    return redirect(route('product.index'))->with('success', 'Product created successfully!');
}

    public function edit(Product $product)
    {
        return view('edit', ['product'=>$product]);
    }

    public function update(Product $product, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);

        $product->update($data);
        return redirect(route('product.index'))->with('success','Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with('success','Product deleted successfully');
    }

}
