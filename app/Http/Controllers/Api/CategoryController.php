<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $categories = Category::where('status', 1)->get();
            return $this->sendAsJson($categories, 200);

        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        try {

            return $this->sendAsJson($category, 200);

        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }
}
