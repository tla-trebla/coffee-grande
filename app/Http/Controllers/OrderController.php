<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders = DB::table('orders')->orderBy('id', 'DESC')->get();

        return response()->json([
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOrderRequest $request
     * @return Response
     */
    public function store(StoreOrderRequest $request)
    {
        $order = new Order($request->all());

        $order->save();

        return response()->json([
            'order' => $order
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return void
     */
    public function show(Order $order)
    {
        return response()->json([
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOrderRequest $request
     * @param Order $order
     * @return void
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());

        return response()->json([
            'order' => $order
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @return void
     * @throws Exception
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json([
            'order' => $order
        ]);
    }
}
