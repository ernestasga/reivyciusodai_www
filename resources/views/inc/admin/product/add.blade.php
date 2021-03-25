<button  class="btn btn-success" data-toggle="modal" data-target="#newProductModal">
    New <i class="fa fa-plus-circle fa-lg"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="newProductModal" tabindex="-1" role="dialog" aria-labelledby="newProductModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form  enctype="multipart/form-data" method="POST" action="{{route('products.store')}}">
            @csrf
            @method('POST')
            <label>Name*</label>
            <input required type="text" class="form-control" name="name"  maxlength="255">
            <label>Description</label>
            <textarea class="form-control" name="description"  maxlength="2000"></textarea>
            <label>Category*</label>
            <select required class="form-control" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <div class="row">
                <div class="col-md-6"><label>Price*</label><input required type="number" step="0.01" class="form-control" name="price"  maxlength="255"></div>
                <div class="col-md-6"><label>Sale Price</label><input type="number" step="0.01" class="form-control" name="sale_price"  maxlength="255"></div>
            </div>
            <div class="row">
                <div class="col-md-6"><label>Stock</label><input type="number" class="form-control" name="stock"  maxlength="255"></div>
                <div class="col-md-6">
                    <label for="popular">Popular</label>
                    <input type="checkbox" class="form-control" name="popular">
                </div>
            </div>
            <br>
            <div class="custom-file">
                <input type="file" name="file[]" class="custom-file-input" id="file" multiple>
                <label class="custom-file-label" for="file">Choose file</label>
            </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add this product</button>
        </div>
    </form>

    </div>
</div>
</div>
