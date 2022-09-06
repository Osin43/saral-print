<?php

namespace App\Http\Controllers;

use App\Models\Coupon_code;
use Illuminate\Http\Request;
use App\Http\Requests\CouponRequest;
// use App\Http\Controllers\CouponCodeController;

class CouponCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CouponRequest $request)
    {
        Coupon_code::create([
            'coupon_code' =>$request -> coupon_code,
            'value' => $request -> value,
            'type' => $request -> type,
            'status'=> $request -> status,
            'product'=>$request -> product,
            'shipping'=>$request -> shipping,
            

        ]);

        $response = [
            "status" => true,
            "message" => "Successfully",

        ];

        return $response;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon_code  $coupon_code
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $coupon = Coupon_code::find($id);

        if (!$coupon) {
            return response()->json(["message" => "not found"], 404);
        }

        return response()->json($coupon, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon_code  $coupon_code
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon_code $coupon_code)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon_code  $coupon_code
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon_code $coupon_code)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon_code  $coupon_code
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon_code $coupon_code)
    {
        //
    }
}
