<button  class="btn btn-success" data-toggle="modal" data-target="#newCategoryModal">
    New <i class="fa fa-plus-circle fa-lg"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form  enctype="multipart/form-data" method="POST" action="{{route('categories.store')}}">
            @csrf
            @method('POST')
            <label>Name*</label>
            <input required type="text" class="form-control" name="name" maxlength="255">
            <label>Description</label>
            <textarea class="form-control" name="description"  maxlength="2000"></textarea>
            <div class="row">
                <div class="col-6">
                    <label>Icon</label>
                    <input type="text" class="form-control" name="icon"  maxlength="255">
                </div>
                <div class="col-6">
                    <label>Photo*</label>
                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="file" required>
                        <label class="custom-file-label" for="file">Choose file</label>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add this category</button>
        </div>
    </form>

    </div>
</div>
</div>
