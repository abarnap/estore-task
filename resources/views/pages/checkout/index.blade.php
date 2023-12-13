@extends('layouts.app')
@section('title', 'Checkout')
@section('content')

<section id="checkout">
    <div class="container">
        <div class="row gy-3 justify-content-start">
            <div class="col-lg-7">
                <div class="card p-4">
                    <form class="row gy-3" action="{{url('placeOrder')}}" method="post">
                        @csrf
                        @if(\Auth::user() && \Auth::user()->role == 'Customer')
                        <div class="col-lg-6">
                            <label for="nameInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="nameInput" name="name"
                                value="{{\Auth::user()->name}}" readonly>
                            @error('name')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="emailInput" class="form-label">Email</label>
                            <input type="text" class="form-control" id="emailInput" name="email"
                                value="{{\Auth::user()->email}}" readonly>
                            @error('email')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <input type="hidden" name="user_id" value="{{\Auth::user()->id}}">
                        @else
                        <div class="col-lg-6">
                            <label for="nameInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="nameInput" name="name" value="{{old('name')}}">
                            @error('name')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="emailInput" class="form-label">Email</label>
                            <input type="text" class="form-control" id="emailInput" name="email"
                                value="{{old('email')}}">
                            @error('email')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        @endif
                        <div class="col-12">
                            <label for="line1Input" class="form-label">Address Line 1</label>
                            <input type="text" class="form-control" id="line1Input" name="line_1"
                                value="{{old('line_1')}}">
                            @error('line_1')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-12">
                            <label for="line2Input" class="form-label">Address Line 2</label>
                            <input type="text" class="form-control" id="line2Input" name="line_2"
                                value="{{old('line_2')}}">
                            @error('line_2')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="cityInput" class="form-label">City</label>
                            <input type="text" class="form-control" id="cityInput" name="city" value="{{old('city')}}">
                            @error('city')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="stateInput" class="form-label">State</label>
                            <input type="text" class="form-control" id="stateInput" name="state"
                                value="{{old('state')}}">
                            @error('state')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="countryInput" class="form-label">Country</label>
                            <input type="text" class="form-control" id="countryInput" name="country"
                                value="{{old('country')}}">
                            @error('country')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="pincodeInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="pincodeInput" name="pincode"
                                value="{{old('pincode')}}">
                            @error('pincode')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <input type="hidden" name="item_id" value="{{$item->id}}">
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Place Order</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card p-2">
                    <div class="row g-2 justify-content-start align-content-center">
                        <div class="col-2">
                            <img class="img-fluid" src="{{$item->images_path[0]}}" alt="{{$item->slug}}">
                        </div>
                        <div class="col-10">
                            <h6>{{$item->name}}</h6>
                            <h5 class="text-primary">₹ {{$item->price}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection