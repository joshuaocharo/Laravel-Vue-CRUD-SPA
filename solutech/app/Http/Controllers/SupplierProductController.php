<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierProductController extends Controller
{
    // all supplier products
    public function indexsp()
    {
        $supplierproducts = SupplierProduct::all()->toArray();
        return array_reverse($supplierproducts);
    }

    // add supplier products
    public function addsp(Request $request)
    {
        $supplierproduct = new SupplierProduct([
            'supply_id' => $request->input('supply_id'),
            'product_id' => $request->input('product_id')
        ]);
        $supplierproduct->save();

        return response()->json('Supplier product successfully added');
    }

    // edit supplier products
    public function editsp($id)
    {
        $supplierproduct = SupplierProduct::find($id);
        return response()->json($supplierproduct);
    }

    // update supplier products
    public function updatesp($id, Request $request)
    {
        $supplierproduct = SupplierProduct::find($id);
        $supplierproduct>update($request->all());

        return response()->json('Supplier product successfully updated');
    }

    // delete supplier products
    public function deletesp($id)
    {
        $supplierproduct = SupplierProduct::find($id);
        $supplierproduct->delete();

        return response()->json('Supplier product successfully deleted');
    }
}
