<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Promotion;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $promotions = DB::table('promotions')->orderBy('id', 'DESC')->get();

        return response()->json([
            'promotions' => $promotions
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
     * @param StorePromotionRequest $request
     * @return Response
     */
    public function store(StorePromotionRequest $request)
    {
        $promotion = new Promotion($request->all());

        $promotion->save();

        return response()->json([
            'promotion' => $promotion
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Promotion $promotion
     * @return void
     */
    public function show(Promotion $promotion)
    {
        return response()->json([
            'promotion' => $promotion
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
     * @param UpdatePromotionRequest $request
     * @param Promotion $promotion
     * @return void
     */
    public function update(UpdatePromotionRequest $request, Promotion $promotion)
    {
        $promotion->update($request->all());

        return response()->json([
            'promotion' => $promotion
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Promotion $promotion
     * @return void
     * @throws Exception
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();

        return response()->json([
            'promotion' => $promotion
        ]);
    }
}
