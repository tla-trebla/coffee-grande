<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Reservation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $reservations = DB::table('reservations')->orderBy('id', 'DESC')->get();

        return response()->json([
            'reservations' => $reservations
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
     * @param StoreReservationRequest $request
     * @return Response
     */
    public function store(StoreReservationRequest $request)
    {
        $reservation = new Reservation($request->all());

        $reservation->save();

        return response()->json([
            'reservation' => $reservation
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Reservation $reservation
     * @return void
     */
    public function show(Reservation $reservation)
    {
        return response()->json([
            'reservation' => $reservation
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
     * @param UpdateReservationRequest $request
     * @param Reservation $reservation
     * @return void
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $reservation->update($request->all());

        return response()->json([
            'reservation' => $reservation
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Reservation $reservation
     * @return void
     * @throws Exception
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return response()->json([
            'reservation' => $reservation
        ]);
    }
}
