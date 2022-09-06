<?php

namespace App\Http\Controllers;

use App\Models\IndividualRateList;
use Illuminate\Http\Request;
use App\Http\Requests\RateRequest;
class IndividualRateListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $price =IndividualRateList::all();

        return response()->json($price, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RateRequest $request)
    {
        
        $price = IndividualRateList::create([
            'quantity'=> $request -> quantity,
            'normal_price'=>$request -> normal_price,
            'urgent_price'=>$request->urgent_price,
            'product_id'=>$request->product_id,
            'discount'=>$request ->discount,
        ]);
        return $price;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IndividualRateList  $individualRateList
     * @return \Illuminate\Http\Response
     */
    public function show(IndividualRateList $id)
    {
        $price =IndividualRateList ::find($id);
        // CorporateRateList 

        if (!$price) {
            return response()->json(["message" => " not found"], 404);
        }

        return response()->json($price, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IndividualRateList  $individualRateList
     * @return \Illuminate\Http\Response
     */
    public function edit(IndividualRateList $individualRateList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IndividualRateList  $individualRateList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IndividualRateList $id)
    {
        $price               = IndividualRateList::find($id);
        $price->quantity         = $request->quantity ? $request->quantity : $price->name;
        $price->normal_price        = $request->normal_price ? $request->normal_price : $price->normal_price;
        $price->urgent_price       = $request->urgent_price ? $request->urgent_price : $price->urgent_price;
        $price->product_id       = $request->product_id ? $request->product_id : $price->product_id;
         $price->update();
       
        $errResponse = [
            "status" => false,
            "message" => "Update error"
        ];

        if (!$price) {
            return response()->json($errResponse, 404);
        }

        $successResponse = [
            "status" => true,
            "message" => "Updated Successfully"
        ];

        return response()->json($successResponse, 201);
}
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RateList  $rateList
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $price = IndividualRateList::find($id);
        if (!$price) {
            return response()->json(["message" => "rate list not found"], 404);
        }
        $price->delete();
        $successResponse = ["message" => "Rate List deleted successfully"];
        return response()->json($successResponse, 200);
    }
    }

    