<?php

namespace App\Http\Controllers;

use App\Mail\NewOrderMail;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;

class CheckoutController extends Controller
{
    public function index(Item $item)
    {
        if (!$item) {
            abort(404);
        }

        return view('pages.checkout.index', compact('item'));
    }

    public function placeOrder(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'nullable',
            'name' => 'required',
            'email' => 'required|email',
            'item_id' => 'required',
            'line_1' => 'required',
            'line_2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pincode' => 'required',
        ]);

        if (!$request->user_id) {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                toastr()->warning('User already exist with this email, Please login to place order');
                return redirect()->back();
            }
        }

        $order = new Order();
        $order->name = $request->name;
        $order->item_id = $request->item_id;
        $order->line_1 = $request->line_1;
        $order->line_2 = $request->line_2;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->country = $request->country;
        $order->pincode = $request->pincode;

        if ($request->user_id) {
            $order->user_id = $request->user_id;
        } else {
            $order->guest_email = $request->email;
        }

        $order->save();

        $item = Item::find($request->item_id);
        $item->stock = $item->stock - 1;
        $item->save();

        Mail::to($request->email)->send(new NewOrderMail($order));

        toastr()->success('Order Placed, Check your mail inbox');
        return redirect('/');
    }
}
