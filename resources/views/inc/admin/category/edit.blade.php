<button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal{{$category->id}}">EDIT</button></td>
<!-- Modal -->
<div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$category->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category #{{$category->id}} {{$category->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form  enctype="multipart/form-data" method="POST" action="{{route('categories.update', $category)}}">
                @csrf
                @method('PUT')
                <label>Name*</label>
            <input required type="text" class="form-control" name="name" value="{{ $category->name }}"  maxlength="255">
                <label>Description</label>
                <textarea class="form-control" name="description"  maxlength="255">{{ $category->description }}</textarea>
                <div class="row">
                    <div class="col-6">
                        <label>Icon</label>
                        <input type="text" class="form-control" name="icon" value="{{$category->icon}}"  maxlength="255">
                    </div>
                    <div class="col-6">
                        <label>Photo</label>
                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" id="file">
                            <label class="custom-file-label" for="file">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Edit this category</button>
            </div>
        </form>
        <h4 class="text-center">Media</h4>
        <div class="container page-top">
            <div class="row">
                @foreach ($category->getMedia('images') as $image)
                    <div class="border col-lg-3 col-md-4 col-xs-6 thumb" id="img-{{$image->id}}">
                        <a href="{{$image->getUrl('thumb')}}"><img src="{{$image->getUrl('thumb')}}" class="img-fluid "  alt=""></a>
                        <button class="del_img_button btn btn-danger" id="{{$image->id}}"><i class="fa fa-trash"></i></button>
                    </div>
                @endforeach
           </div>

    </div>
    </div>
</div>
