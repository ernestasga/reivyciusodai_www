  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
    <div class="container">
      <a class="navbar-brand" href="{{route('home')}}">
        <img src="/images/logo_long.png" alt="" height="35">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
            @foreach ($categories as $category)
              <li class="nav-item">
                <a class="nav-link" href="{{route('visitor.category.show', $category->slug)}}"><i class="{{$category->icon}}"></i> {{$category->name}} <span class="badge badge-light"> {{$category->product->count()}}</span></a>
              </li>
            @endforeach
        </ul>
        <ul class="navbar-nav ml-auto navbar-right">

          <li class="nav-item">
            <a class="nav-link" href="{{route('visitor.post.index')}}"><i class="fa fa-newspaper text-white"></i> {{config('app.posts_page_name')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('contact')}}"><i class="fa fa-id-card text-white"></i> {{config('app.contact_page_name')}}
            </a>
          </li>

        </ul>
      </div>

    </div>
  </nav>
