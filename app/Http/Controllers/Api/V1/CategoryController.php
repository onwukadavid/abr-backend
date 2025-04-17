<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // If category slug is provided, try to find the category
        if ($request->category) {
            try{
                // Find the category by slug
                $category = Category::where('slug', $request->category)->first();
                if (!$category){
                    // If the category is not found, throw an exception
                    throw new \Exception();
                }
                // Return the category data
                return response()->json([
                    'status' => 'success',
                    'message' => 'Category data loaded successfully.',
                    'data' => [
                        'category' => CategoryResource::make($category)
                    ],
                ]);
            }catch (\Exception $e){
                // If the category is not found, return 404
                return response()->json([
                    'status' => 'error',
                    'message' => 'Category not found.',
                ], 404);
            }
        }
        
        // If category slug is not provided, return all categories
        return response()->json([
            'status' => 'success',
            'message' => 'Category data loaded successfully.',
            'data' => [
                'categories' => CategoryResource::collection(Category::get())
            ],
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        try{
            // Return the category data as a JSON response
            return response()->json([
                'status' => 'success',
                'message' => 'Category data loaded successfully.',
                'data' => [
                    'category' => CategoryResource::make($category)
                ],
            ]);
        }catch (Exception $e){
            // Return an error response if the category is not found
            return response()->json([
                'status' => 'error',
                'message' => 'Category not found.',
            ], 400);
        }
    }
}
