<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    // all order details
    public function indexoc()
    {
        $orderdetails = OrderDetail::all()->toArray();
        return array_reverse($orderdetails);
    }

    // add order details
    public function addod(Request $request)
    {
        $orderdetail = new OrderDetail([
            'order_id' => $request->input('order_id'),
            'product_id' => $request->input('product_id')
        ]);
        $orderdetail->save();

        return response()->json('Order detail successfully added');
    }

    // edit order details
    public function editod($id)
    {
        $orderdetail = OrderDetail::find($id);
        return response()->json($orderdetail);
    }

    // update order details
    public function updateod($id, Request $request)
    {
        $orderdetail = OrderDetail::find($id);
        $orderdetail>update($request->all());

        return response()->json('Order detail successfully added');
    }

    // delete order details
    public function deleteod($id)
    {
        $orderdetail = OrderDetail::find($id);
        $orderdetail->delete();

        return response()->json('Order detail successfully added');
    }
}
