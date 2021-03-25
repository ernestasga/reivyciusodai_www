<div class="container slick">
        @foreach ($categories as $category)
            <div class="col" onclick="window.location='{{route('visitor.category.show', $category->slug)}}'">
                <div class="card">
                    <div class="ribbon ribbon-top-right"><span><small class="cross">x </small>{{$category->product->count()}}</span></div>
                    <img class="card-img-top" src="{{ $category->getFirstMediaUrl('images', 'thumb') }}" alt="{{$category->name}}">
                    <div class="card-body">
                        <h3>{{$category->name}}</h3>
                        <p class="card-text">{{$category->description}}</p>
                    </div>
                </div>
            </div>
        @endforeach
</div>
