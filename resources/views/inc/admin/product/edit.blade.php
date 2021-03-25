<!-- Modal -->
<div class="modal fade" id="editProductModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="editProductModal-{{$product->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit {{$product->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" method="POST" action="{{route('products.update', $product->id)}}">
            @csrf
            @method('PUT')
            <label>Name*</label>
            <input required value="{{$product->name}}" type="text" class="form-control" name="name"  maxlength="255">
            <label>Description</label>
            <textarea class="form-control" name="description"  maxlength="255">{{$product->description}}</textarea>
            <label>Category*</label>
            <select required class="form-control" name="category_id">
                @foreach ($categories as $category)
                    @if ($product->category)
                        @if ($product->category->id == $category->id)
                            <option selected value="{{$category->id}}">{{$category->name}}</option>
                        @else
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endif

                @endforeach
            </select>
            <div class="row">
                <div class="col-md-6"><label>Price*</label><input required value="{{$product->price}}" type="number" step="0.01" class="form-control" name="price"  maxlength="255"></div>
                <div class="col-md-6"><label>Sale Price</label><input value="{{$product->sale_price}}" type="number" step="0.01" class="form-control" name="sale_price"  maxlength="255"></div>
            </div>
            <div class="row">
                <div class="col-md-6"><label>Stock</label><input value="{{$product->stock}}" type="number" class="form-control" name="stock"  maxlength="255"></div>
                <div class="col-md-6">
                    <label for="popular">Popular</label>
                    <input {{$product->popular ? 'checked' : ''}} type="checkbox" class="form-control" name="popular">
                </div>
            </div>
            <br>
            <div class="custom-file">
                <input type="file" name="file[]" class="custom-file-input" id="file" multiple>
                <label class="custom-file-label" for="file">Choose file</label>
            </div>

        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    <h4 class="text-center">Media</h4>
    <div class="container page-top">
        <div class="row">
            @foreach ($product->getMedia('images') as $image)
                <div class="border col-lg-3 col-md-4 col-xs-6 thumb" id="img-{{$image->id}}">
                    <a href="{{$image->getUrl('thumb')}}"><img src="{{$image->getUrl('thumb')}}" class="img-fluid "  alt=""></a>
                    <button class="del_img_button btn btn-danger" id="{{$image->id}}"><i class="fa fa-trash"></i></button>
                </div>
            @endforeach
       </div>
    </div>
    </div>
</div>
</div>
