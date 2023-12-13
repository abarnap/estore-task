<section id="category-list">
    <div class="container">
        <div class="row gy-3">
            <div class="col-12">
                <h6 class="mb-1">Categories</h6>
            </div>
            @foreach($categories as $category)
            <div class="col-lg-2">
                <a href="{{url('shops/'.$category->slug)}}">
                    <div class="card p-1">
                        <img class="object-fit-cover" src="{{$category->image_path}}" alt="{{$category->slug}}"
                            width="100%" height="180px">
                        <p class="mx-2 my-1 text-center">{{$category->name}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>