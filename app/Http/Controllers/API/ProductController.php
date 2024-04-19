<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Product::all();
        $product = Product::all()
                  ->groupBy('price')
                  ->having('price', '>', 1000)
                  ->limit(10)
                  ->get();
        $arr=[
            'status'=>true,
            'data' => $product

        ];
        return response()->json($arr,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
         $input = $request->all();
        $validator = \Validator::make($input, [
        'name' => 'required', 'price' => 'required'
        ]);
        if($validator->fails()){
            $arr = [
            'success' => false,
            'message' => 'Lỗi kiểm tra dữ liệu',
            'data' => $validator->errors()
            ];
            return response()->json($arr, 200);
        }
        $product = Product::create($input);
        $arr = ['status' => true,
            'message'=>"Sản phẩm đã lưu thành công",
            'data'=> $product
        ];
        return response()->json($arr, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);
        if(is_null($product)){
            $arr=[
                'status'=>false,
                'message' => 'product not found'
            ];
            return response()->json($arr,404);
        }else{
            $arr=[
                'status'=>true,
                'data' => $product
            ];
            return response()->json($arr,200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        $arr = [
            'status' => true,
            'message' => 'Sản phẩm cập nhật thành công',
            'data' => $product
        ];
        return response()->json($arr, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(is_null($product)){
            $arr=[
                'status'=>false,
                'message' => 'product not found',
            ];
        }else{
            $product->delete();
            $arr=[
                'status'=>true,
                'message' => 'product deleted successfully'
            ];
        }
        return response()->json($arr,200);
    }

    public function searchName(Request $request, $name){
        $name = Product::where('name','like','%'.$name.'%')->get();
        if(is_null($name)){
            $arr=[
                'status'=>false,
                'message' => 'product not found',
            ];
        }else{
            $arr=[
                'status'=>true,
                'data' => $name
            ];
        }
        return response()->json($arr,200);

    }
}