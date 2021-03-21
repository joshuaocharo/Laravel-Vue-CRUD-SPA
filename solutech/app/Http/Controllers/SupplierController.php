<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // all suppliers
    public function indexs()
    {
        $suppliers = Supplier::all()->toArray();
        return array_reverse($suppliers);
    }

    // add supplier
    public function adds(Request $request)
    {
        $supplier = new Supplier([
            
            'name' => $request->input('name')
        ]);
        $supplier->save();

        return response()->json('The supplier is successfully added');
    }

    // edit supplier 
    public function edits($id)
    {
        $supplier = Supplier::find($id);
        return response()->json($supplier);
    }

    // update supplier
    public function updates($id, Request $request)
    {
        $supplier = Supplier::find($id);
        $supplier>update($request->all());

        return response()->json('The supplier is successfully updated');
    }

    // delete supplier
    public function deletes($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return response()->json('The supplier is successfully deleted');
    }
}
