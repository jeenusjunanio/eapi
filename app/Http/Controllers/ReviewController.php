<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\reviews\ReviewCollection;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\product\ProductResource;
use Symfony\Component\HttpFoundation\Response;


class ReviewController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api')->except('index','show');
    }
    public function index(Product $product)
    {
       $reviews=$product->review;
        
       return ReviewCollection::collection($reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request)
    {
        // return $request;
        // die();
        $review= new Review([
            'product_id' => $request->product_id,
            'customer' => $request->name,
            'review' => $request->description,
            'star' => $request->rating
        ]);
        $review->save();
        return response([
            'data' => 'Review added successfully'
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
       //  $reviews=Review::findOrFail($review);
       // return $reviews;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        return ('it works');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        dd('delete request for'.$review);
    }
}
