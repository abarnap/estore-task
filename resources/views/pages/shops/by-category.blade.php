@extends('layouts.app')
@section('title', 'Shop')
@section('content')

<section id="by-category">
    <div class="container">
        <div class="row gy-3">
            @foreach($category->subCategories as $subCategory)
            @if($subCategory->status == 1)
            <div class="col-lg-2">
                <a href="{{url('shops/'.$category->slug.'/'.$subCategory->slug)}}">
                    <div class="card p-1">
                        <img class="object-fit-cover" src="{{$subCategory->image_path}}" alt="{{$subCategory->slug}}"
                            width="100%" height="180px">
                        <p class="mx-2 my-1 text-center">{{$subCategory->name}}</p>
                    </div>
                </a>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

@endsection