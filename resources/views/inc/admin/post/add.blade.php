<button  class="btn btn-success" data-toggle="modal" data-target="#newPostModal">
    New Post <i class="fa fa-plus-circle fa-lg"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="newPostModal" tabindex="-1" role="dialog" aria-labelledby="newPostModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Add New Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form  enctype="multipart/form-data" method="POST" action="{{route('posts.store')}}">
            @csrf
            @method('POST')
            <label>Title*</label>
            <input required type="text" class="form-control" name="name"  maxlength="255">
            <label>Content*</label>
            <textarea class="form-control" name="content" required  maxlength="10000"></textarea>

            <br>
            <label>Photo*</label>
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="file" required>
                <label class="custom-file-label" for="file">Choose file</label>
            </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add this post</button>
        </div>
    </form>

    </div>
</div>
</div>
