@extends('layouts.app')
@section('title', 'Orders')
@section('content')

<section id="myOrders">
    <div class="container">
        <div class="row gy-3">
            @foreach($orders as $order)
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="row g-2 justify-content-start align-content-center">
                        <div class="col-md-4">
                            <img class="img-fluid" src="{{$order->item->images_path[0]}}" alt="{{$order->item->slug}}">

                        </div>
                        <div class="col-md-8">
                            <h6 class="my-2">{{$order->item->name}}</h6>
                            <h5 class="text-primary">₹ {{$order->item->price}}</h5>
                        </div>
                        <div class="col-12">
                            <h6 class="my-2">Address</h6>
                            <p>
                                {{$order->line_1}}, {{$order->line_2}}, {{$order->city}}, {{$order->state}},
                                {{$order->country}}, {{$order->pincode}},
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection