<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $query = Order::with('user', 'item');

            if (\Auth::user()->role != 'Admin') {
                $query->where('user_id', \Auth::user()->id);
            }

            return $this->sendAsJson($query->get(), 200);

        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        try {

            $order = Order::with('user', 'item')->where('id', $order->id)->first();
            return $this->sendAsJson($order, 200);

        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        try {

            $order->delete();
            return $this->sendAsJson([], 200);

        } catch (\Exception $e) {
            return $this->sendAsJson($e->getMessage(), 500);
        }
    }
}
