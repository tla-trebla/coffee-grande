<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = DB::table('categories')->orderBy('id', 'DESC')->get();

        return response()->json([
            'categories' => $categories
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
     * @param StoreCategoryRequest $request
     * @return Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category($request->all());

        $category->save();

        return response()->json([
            'category' => $category
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        return response()->json([
            'category' => $category
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
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return void
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        return response()->json([
            'category' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return void
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'category' => $category
        ]);
    }
}
