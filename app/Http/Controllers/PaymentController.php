<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $payments = DB::table('payments')->orderBy('id', 'DESC')->get();

        return response()->json([
            'payments' => $payments
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
     * @param StorePaymentRequest $request
     * @return Response
     */
    public function store(StorePaymentRequest $request)
    {
        $payment = new Payment($request->all());

        $payment->save();

        return response()->json([
            'payment' => $payment
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Payment $payment
     * @return void
     */
    public function show(Payment $payment)
    {
        return response()->json([
            'payment' => $payment
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
     * @param UpdatePaymentRequest $request
     * @param Payment $payment
     * @return void
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->all());

        return response()->json([
            'payment' => $payment
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Payment $payment
     * @return void
     * @throws Exception
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return response()->json([
            'payment' => $payment
        ]);
    }
}
