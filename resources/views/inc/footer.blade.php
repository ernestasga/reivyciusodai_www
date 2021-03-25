<footer class="bg-primary text-white text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase">{{config('app.footer_title')}}</h5>

            <p>
                {{config('app.footer_text')}}
            </p>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Kategorijos</h5>

          <ul class="list-unstyled mb-0">
            <a href="{{route('visitor.product.index')}}" class="text-white">Visi</a>
              @foreach ($categories as $category)
                <li>
                    <a href="{{route('visitor.category.show', $category->slug)}}" class="text-white"><i class="{{$category->icon}}"></i> {{$category->name}}</a>
                </li>
              @endforeach

          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Nuorodos</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="{{route('visitor.post.index')}}" class="text-white"><i class="fa fa-newspaper "></i> {{config('app.posts_page_name')}}</a>
            </li>
            <li>
              <a href="{{route('contact')}}" class="text-white"><i class="fa fa-id-card "></i> {{config('app.contact_page_name')}}</a>
            </li>
            <li>
                <a href="{{config('app.android_app_url')}}" class="text-white"><i class="fab fa-android "></i> Android programėlė</a>
            </li>
            <li>
                <a href="https://facebook.com/{{config('app.facebook')}}" class="fab fa-facebook-f"> facebook</a>
            </li>

          </ul>
        </div>

        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        {{config('app.footer_tag')}}

    </div>
    <!-- Copyright -->
  </footer>
