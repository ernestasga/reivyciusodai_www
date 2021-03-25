<div class="row ml-0 mr-0">
    <!-- Search Widget -->
    <div class="card mb-4 col-12 col-sm-12 col-md-12 col-lg-12 nopadding">
        <h5 class="card-header">Paieška</h5>
        <div class="card-body">
            @include('inc.search')
        </div>
    </div>
    <div class="card mb-4 col-6 col-sm-6 col-md-12 col-lg-12 nopadding">
        <!-- Naujausi įrašai -->

            <div class="card-header h5">Naujausi įrašai</div>
            <ul class="list-group">
                @foreach ($latest_posts as $latest_post)
                    <li class="list-group-item">
                        <a href="{{route('visitor.post.show', $latest_post->slug)}}">{{$latest_post->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Kategorijos -->
        <div class="card mb-4 col-6 col-sm-6 col-md-12 col-lg-12 nopadding">
            <div class="list-group">
                <h5 class="card-header ">Kategorijos</h5>

            <a href="{{route('visitor.product.index')}}"
                class="list-group-item {{ (!empty($product)) || !empty($active_category) ? '' : 'active' }}">
                    Visi <span class="badge badge-light"> {{$product_count}}</span></a>
            @foreach ($categories as $category)
                @isset ($product)
                    @if ($category == $product->category)
                        <a href="{{route('visitor.category.show', $category->slug)}}" class="list-group-item active"><i class="{{$category->icon}}"></i> {{$category->name}} <span class="badge badge-light"> {{$category->product->count()}}</span></a>
                    @else
                        <a href="{{route('visitor.category.show', $category->slug)}}" class="list-group-item"><i class="{{$category->icon}}"></i> {{$category->name}} <span class="badge badge-light"> {{$category->product->count()}}</span></a>
                    @endif
                @endisset
                @isset($active_category)
                    @if ($active_category == $category)
                        <a href="{{route('visitor.category.show', $category->slug)}}" class="list-group-item active"><i class="{{$category->icon}}"></i> {{$category->name}} <span class="badge badge-light"> {{$category->product->count()}}</span></a>
                    @else
                        <a href="{{route('visitor.category.show', $category->slug)}}" class="list-group-item"><i class="{{$category->icon}}"></i> {{$category->name}} <span class="badge badge-light"> {{$category->product->count()}}</span></a>
                    @endif
                @else
                    @isset($product)
                    @else
                        <a href="{{route('visitor.category.show', $category->slug)}}" class="list-group-item"><i class="{{$category->icon}}"></i> {{$category->name}} <span class="badge badge-light"> {{$category->product->count()}}</span></a>
                    @endisset
                @endisset
            @endforeach
            </div>
        </div>


</div>
