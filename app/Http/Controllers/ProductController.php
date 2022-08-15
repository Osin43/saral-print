<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\CategoryController;

class ProductController extends Controller
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
    public function create(Request $request)
    {
        $request->  validate([
            'data*.name' =>'required',
            'data*.desc'=>'required',
            'data*.title'=>'required',
            'image'=>'mimes:jpg,jpeg,png|max:5048',
            'data*.price'=>'required',
            'data*.category_id'=>'required'
        ]);
        $product_data = json_decode($request->data);
        // if(!$request->has('name')){
           
        //     return response()->json(['message' => 'Missing file'], 404); 
        // }
        // return $product_data;

        // $user_data        = json_decode($request->data);
 
        $image_file=$request->file('image');
        $FileName = uniqid() . '.' . $image_file->extension();
        $image_file->storeAs('public/images/product_image', $FileName);
 
 
        Product::create([
                'name'=> $product_data ->name,
                'desc'=>$product_data->desc,
                 'title'=>$product_data->title,
                'image'=>$FileName,   
                 'price'=>$product_data->price,
                'parent_id'=>$product_data->parent_id
            ]);

        

        $response = [
                "status" => true,
                "message" => "Product Created Successfully",
            ];
        return response()->json($response, 201);
    }

    public function categories($id)
    {
        // $category = Category::with('product')->find($id); 

        // return view('products.categories')->with('products', $category);
    }
    /*
*
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
