<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // all orders
    public function indexo()
    {
        $orders = Order::all()->toArray();
        return array_reverse($orders);
    }

    // add order
    public function addo(Request $request)
    {
        $order = new Order([
            'order_number' => $request->input('order_number')
        ]);
        $order->save();

        return response()->json('Order successfully added');
    }

    // edit order
    public function edito($id)
    {
        $order = Order::find($id);
        return response()->json($order);
    }

    // update order
    public function updateo($id, Request $request)
    {
        $order = Order::find($id);
        $order>update($request->all());

        return response()->json('Order successfully updated');
    }

    // delete order
    public function deleteo($id)
    {
        $order = Order::find($id);
        $order->delete();

        return response()->json('Order successfully deleted');
    }
}
