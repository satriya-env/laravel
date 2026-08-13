<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Categories::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string|max:50',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = Categories::create($validator->validated());
        return response()->json([
            'message' => 'Data created succesfully',
            'data' => $data
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Category::with('product')->find($id);

        if(!$data){
            return response()->json([
                'message' => '404 not found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categories, string $id)
    {
        //
        $data = Categories::find($id);
        if(!$data){
            return response()->json(['message' => 'abcd' ], 404);
        }

        $validator = Validator::make($request->all(),[
            'nama' => 'required|string|max:50'
        ]);

        if($validator->fails()){
            return response()-> json([
                'error' => $validator->errors()
            ], 422);
        }

        $data->update($validator->validated());
        return response()->json([
            'message' => 'Category updated successfully',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories, string $id)
    {
        //
        $data = Categories::findOrFail ($id);
        if(!$data){
            return response()->json(['message'=>'Product not found'], 404);
        }

        $data->delete();
        return response()->json([
            'message' => 'Product Deleted Successfully',
        ]);
    }
}
