<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$orders = auth()->user()->orders; //N+1 ISSUES
        $orders = auth()->user()->orders()->with('products')->get(); //FIX N+1 ISSUES

        return view('user.my-orders')->withOrders($orders);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if(auth()->id() != $order->user_id)
        {
            return back()->withErrors('You do not have access to this order!');
        }

        $products = $order->products;

        return view('user.my-order')->with([
            'order' => $order,
            'products' => $products
        ]);
    }

}
