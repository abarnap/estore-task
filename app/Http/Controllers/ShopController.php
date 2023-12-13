<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\SubCategory;

class ShopController extends Controller
{
    public function byCategory($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)
            ->where('status', 1)->first();
        if (!$category) {
            abort(404);
        }
        return view('pages.shops.by-category', compact('category'));
    }

    public function bySubCategory($categorySlug, $subCategorySlug)
    {
        $category = Category::where('slug', $categorySlug)
            ->where('status', 1)->first();
        if (!$category) {
            abort(404);
        }

        $subCategory = SubCategory::where('slug', $subCategorySlug)
            ->where('category_id', $category->id)
            ->where('status', 1)->first();
        if (!$subCategory) {
            abort(404);
        }

        return view('pages.shops.by-sub-category', compact('subCategory'));
    }

    public function byItem($categorySlug, $subCategorySlug, $itemSlug)
    {
        $category = Category::where('slug', $categorySlug)
            ->where('status', 1)->first();
        if (!$category) {
            abort(404);
        }

        $subCategory = SubCategory::where('slug', $subCategorySlug)
            ->where('category_id', $category->id)
            ->where('status', 1)->first();
        if (!$subCategory) {
            abort(404);
        }

        $item = Item::where('slug', $itemSlug)
            ->where('category_id', $category->id)
            ->where('sub_category_id', $subCategory->id)
            ->where('status', 1)->first();
        if (!$item) {
            abort(404);
        }

        return view('pages.shops.by-item', compact('item'));
    }
}
