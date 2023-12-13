@extends('layouts.app')
@section('title', 'Shop')
@section('content')

<section id="by-item">
    <div class="container">
        <div class="row gy-3">
            <div class="col-md-6">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach($item->images_path as $key => $image)
                        <div class="carousel-item {{$key === 0 ? 'active' : ''}}">
                            <img src="{{$image}}" class="d-block w-100 object-fit-cover" alt="{{$item->slug}}"
                                width="100%" height="500px">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <h4>{{$item->name}}</h4>
                <h2 class="text-primary">₹ {{$item->price}}</h2>
                @if($item->stock > 50)
                <h5><span class="badge custom-badge-instock">{{$item->stock}} Qty is left</span></h5>
                @elseif($item->stock < 50 && $item->stock != 0)
                    <h5><span class="badge custom-badge-fewstock">{{$item->stock}} Qty is left. Hurry Up!</span></h5>
                    @else
                    <h5><span class="badge custom-badge-outstock">Out of Stock</span></h5>
                    @endif
                    <p>{{$item->description}}</p>
                    <div>
                        <a class="btn btn-primary" href="{{url('checkout/'.$item->id)}}">
                            Buy Now
                        </a>
                    </div>
            </div>
        </div>
    </div>
</section>

@endsection