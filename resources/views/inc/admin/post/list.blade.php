
    <div class="card-body">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif
      <table id="posts_table" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th># ({{$posts->count()}})</th>
          <th>Title</th>
          <th>Content</th>
          <th>Date Modified</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($posts as $post)
            <tr data-widget="table" aria-expanded="false">
                <td>{{$post->id}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->content}}</td>
                <td>{{$post->updated_at}}</td>
                <td>
                    @include('inc.admin.post.edit')
                <td>
                    <form method="post" action="{{route('posts.destroy', $post->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </td>
            </tr>
          @endforeach
      </tbody>
    </table>
  </div>
