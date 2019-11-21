<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $ingredients = DB::table('ingredients')->orderBy('id', 'DESC')->get();

        return response()->json([
            'ingredients' => $ingredients
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
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $ingredient = new Ingredient($request->all());

        $ingredient->save();

        return response()->json([
            'ingredient' => $ingredient
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Ingredient $ingredient
     * @return void
     */
    public function show(Ingredient $ingredient)
    {
        return response()->json([
            'ingredient' => $ingredient
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
     * @param Request $request
     * @param Ingredient $ingredient
     * @return void
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $ingredient->update($request->all());

        return response()->json([
            'ingredient' => $ingredient
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ingredient $ingredient
     * @return void
     * @throws Exception
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return response()->json([
            'ingredient' => $ingredient
        ]);
    }
}
