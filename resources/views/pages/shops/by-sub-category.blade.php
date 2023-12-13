@extends('layouts.app')
@section('title', 'Shop')
@section('content')

<section id="by-sub-category">
    <div class="container">
        <div class="row gy-3">
            @foreach($subCategory->items as $item)
            @if($item->status == 1)
            <div class="col-md-3">
                <a href="{{url('shops/'.$subCategory->category->slug.'/'.$subCategory->slug.'/'.$item->slug)}}">
                    <div class="card p-1">
                        <img class="object-fit-cover" src="{{$item->images_path[0]}}" alt="{{$item->slug}}" width="100%"
                            height="250px">
                        <p class="mx-2 my-1 text-center item-name">{{$item->name}}</p>
                        <p class="mx-2 my-1 text-center item-price">₹ {{$item->price}}</p>
                    </div>
                </a>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

@endsection