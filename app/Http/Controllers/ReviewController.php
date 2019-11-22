<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Review;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $reviews = DB::table('reviews')->orderBy('id', 'DESC')->get();

        return response()->json([
            'reviews' => $reviews
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
     * @param StoreReviewRequest $request
     * @return Response
     */
    public function store(StoreReviewRequest $request)
    {
        $review = new Review($request->all());

        $review->save();

        return response()->json([
            'review' => $review
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Review $review
     * @return void
     */
    public function show(Review $review)
    {
        return response()->json([
            'review' => $review
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
     * @param UpdateReviewRequest $request
     * @param Review $review
     * @return void
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        $review->update($request->all());

        return response()->json([
            'review' => $review
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Review $review
     * @return void
     * @throws Exception
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return response()->json([
            'review' => $review
        ]);
    }
}
