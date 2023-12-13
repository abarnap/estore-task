<section id="sub-category-list">
    <div class="container">
        <div class="row gy-3">
            <div class="col-12">
                <h6 class="mb-1">Top Sub Categories</h6>
            </div>
            @foreach($subCategories as $subCategory)
            <div class="col-lg-2">
                <a href="{{url('shops/'.$subCategory->category->slug.'/'.$subCategory->slug)}}">
                    <div class="card p-1">
                        <img class="object-fit-cover" src="{{$subCategory->image_path}}" alt="{{$subCategory->slug}}"
                            width="100%" height="180px">
                        <p class="mx-2 my-1 text-center">{{$subCategory->name}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>