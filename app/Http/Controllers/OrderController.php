<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Product;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name', 'id');
        $products = Product::pluck('titel', 'id');
        return view('admin.orders.create', compact(['users', 'products']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = new Order();
        $order->user_id = $request->user_id;
        $order->save();
        $order->products()->attach($request->products);
        Session::flash('msg', 'Order aangemaakt!');
        return Redirect::to('/admin/orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $users = User::pluck('name', 'id');
        $products = Product::pluck('titel', 'id');
        return view('admin.orders.edit', compact(['users', 'products']))->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        $order->user_id = $request->user_id;
        $order->save();
        $order->products()->detach();
        $order->products()->attach($request->products);
        Session::flash('msg', 'Order geupdatet!');
        return Redirect::to('/admin/orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
