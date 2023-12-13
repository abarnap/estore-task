<section id="latest-item-list">
    <div class="container">
        <div class="row gy-3">
            <div class="col-12">
                <h6 class="mb-1">Latest Products</h6>
            </div>
            @foreach($items as $item)
            <div class="col-lg-3">
                <a href="{{url('shops/'.$item->category->slug.'/'.$item->subCategory->slug.'/'.$item->slug)}}">
                    <div class="card p-1">
                        <img class="object-fit-cover" src="{{$item->images_path[0]}}" alt="{{$item->slug}}" width="100%"
                            height="250px">
                        <p class="mx-2 my-1 text-center item-name">{{$item->name}}</p>
                        <p class="mx-2 my-1 text-center item-price">₹ {{$item->price}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>