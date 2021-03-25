
    <div class="card-body">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif
      <table id="categories_table" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th># ({{$categories->count()}})</th>
          <th>Name</th>
          <th>Description</th>
          <th>Icon</th>
          <th>Date Modified</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($categories as $category)
            <tr data-widget="table" aria-expanded="false">
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td>{{$category->icon}}</td>
                <td>{{$category->updated_at}}</td>
                <td>
                    @include('inc.admin.category.edit')
                <td>
                    <form method="post" action="{{route('categories.destroy', $category->id)}}">
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
