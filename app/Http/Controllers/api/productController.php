<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::all();
        return response() -> json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string|max:50',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'deskripsi' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = Product::create($validator->validated());
        return response()->json([
            'message' => 'Data created succesfully',
            'data' => $data
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::find($id);
        if (!$data){
            return response()-> json(['message'=>'product not found'], 404);
        }
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = Product::find($id);
        if(!$data){
            return response()-> json(['message'=>'product not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:50',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'deskripsi' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        $data->update($validator->validated());
        return response()->json([
            'message' => 'Product Updated Successfully',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Product::findOrFail ($id);
        if(!$data){
            return response()->json(['message'=>'Product not found'], 404);
        }

        $data->delete();
        return response()->json([
            'message' => 'Product Deleted Successfully',
        ]);
    }
}
