<div class="card-body">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
        @endforeach
    @endif
    <table id="products_table" class="table display">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Sale Price</th>
                <th>Stock</th>
                <th>Popular</th>
                <th>Updated</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>
                        @if ($product->category)
                            {{$product->category->name}}
                        @else
                            <i>N/A</i>
                        @endif
                    </td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->sale_price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->popular ? 'Yes' : 'No'}}</td>
                    <td>{{$product->updated_at}}</td>
                    <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editProductModal-{{$product->id}}">EDIT</button></td>
                    </td>
                    <td>
                        <form method="post" action="{{route('products.destroy', $product->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </td>
                </tr>
            @include('inc.admin.product.edit')
            @endforeach


        </tbody>
    </table>
</div>
