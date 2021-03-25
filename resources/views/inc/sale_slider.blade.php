
<div class="slick">
    @foreach ($on_sale as $item)
    <div class="col">
        <div class="card">
            <div class="ribbon-sale ribbon-top-right"><span><small class="cross">-</small>{{ intval((($item->price-$item->sale_price)/$item->price)*100) }}%</span></div>
            <img class="card-img-top" src="{{ $item->getFirstMediaUrl('images', 'thumb') }}" alt="Card image cap">
            <div class="card-body">
            <a href="{{route('visitor.product.show', $item->slug)}}"><h5 class="card-title">{{$item->name}}</h5></a>
            <a href="{{route('visitor.category.show', $item->category->slug)}}"><p>{{$item->category->name}}</p></a>
            <p class="card-text">{{$item->description}}</p>
            <div class="row">
                @isset($item->sale_price)
                  <del><h4 class="ml-3">{{config('app.currency')}}{{$item->price}}</h4></del>
                  <h4 class="discount ml-3">{{config('app.currency')}}{{$item->sale_price}}</h4>
                @else
                  <h4>{{config('app.currency')}}{{$item->price}}</h4>
                @endisset
              </div>
              <a href="{{route('visitor.product.show', $item->slug)}}" class="btn btn-primary">Žiūrėti</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
