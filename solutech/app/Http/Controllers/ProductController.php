<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // all  products
    public function indexp()
    {
        $products = Product::all()->toArray();
        return array_reverse($products);
    }

    // add  products
    public function addp(Request $request)
    {
        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity')
        ]);
        $product->save();

        return response()->json('Product successfully added');
    }

    // edit products
    public function editp($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    // update  products
    public function updatep($id, Request $request)
    {
        $product = Product::find($id);
        $product>update($request->all());

        return response()->json('Product successfully updated');
    }

    // delete products
    public function deletep($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json('Product successfully deleted');
    }
}
