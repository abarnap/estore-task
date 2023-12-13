<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use App\Models\SubCategory;

class MasterController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->orderBy('id', 'desc')->get()->take(6);
        $subCategories = SubCategory::where('status', 1)->orderBy('id', 'desc')->get()->take(6);
        $items = Item::where('status', 1)->orderBy('id', 'desc')->get()->take(6);
        return view('pages.home.index', compact('categories', 'subCategories', 'items'));
    }

    public function login()
    {
        return view('pages.auth.login');
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function myOrders()
    {
        $orders = Order::where('user_id', \Auth::user()->id)->get();
        return view('pages.orders.index', compact('orders'));
    }
}
