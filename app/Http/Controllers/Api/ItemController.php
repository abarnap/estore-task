<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $items = Item::with('category', 'subCategory')->where('status', 1)->get();
            return $this->sendAsJson($items, 200);

        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        try {

            $item = Item::with('category', 'subCategory')->where('id', $item->id)->first();
            return $this->sendAsJson($item, 200);

        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }
}
