<div class="row mb-3 ml-0 mr-0 bg-white" onclick="window.location='{{route('visitor.product.show', $product->slug)}}'">
    <div class="col-3 col-sm-3 col-md-3 col-lg-3">
        @if ($product->sale_price)
            <div class="ribbon-sale ribbon-top-left"><span><small class="cross">-</small>{{ intval((($product->price-$product->sale_price)/$product->price)*100) }}%</span></div>
        @endif
        <img class="img-fluid" src="{{ $product->getFirstMediaUrl('images', 'thumb') }}" height="150"  alt="{{$product->name}}">
    </div>
    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
        <h3 class=""> <a href="{{route('visitor.product.show', $product->slug)}}" data-abc="true">{{$product->name}}</a> </h3>
        <a href="{{route('visitor.category.show', $product->category->slug)}}" class="text-muted" data-abc="true">{{$product->category->name}}</a>
        <p class="mb-3">{{ \Illuminate\Support\Str::limit($product->description, 200, '...') }}</p>
    </div>
    <div class="col-3 col-sm-3 col-md-3 col-lg-3 text-right">
        @if ($product->sale_price)
            <del><h3 >{{config('app.currency')}}{{$product->price}}</h3></del>
            <h3 class="discount">{{config('app.currency')}}{{$product->sale_price}}</h3>
        @else
            <h3>{{config('app.currency')}}{{$product->price}}</h3>
        @endif
        <a href="{{route('contact')}}"><button type="button" class="btn btn-warning mt-4"> {{config('app.contact_page_name')}}</button></a>
    </div>
</div>
