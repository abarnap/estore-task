<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $subCategories = SubCategory::with('category')->where('status', 1)->get();
            return $this->sendAsJson($subCategories, 200);

        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        try {

            $subCategory = SubCategory::with('category')->where('id', $subCategory->id)->first();
            return $this->sendAsJson($subCategory, 200);

        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }
}
