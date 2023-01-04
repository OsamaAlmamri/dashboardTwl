<section class="wrapper bg-light">
  <div class="container py-14 py-md-16">
    <div class="row mb-3">
      <div class="col-md-10 col-lg-12 col-xl-10 col-xxl-9 mx-auto text-center">
        <h2 class="fs-15 text-uppercase text-muted mb-3 text-center">فريقنا</h2>
        <h3 class="display-4 mb-7 px-lg-19 px-xl-18 text-center">تعرف علينا عن قرب.</h3>
      </div>
      <!--/column -->
    </div>
    <!--/.row -->
    <div class="row grid-view gx-md-8 gx-xl-10 gy-8 gy-lg-0">
        @foreach($teams as $team)
      <div class="col-md-6 col-lg-3 my-2">
        <div class="position-relative">
          <div class="shape rounded bg-soft-blue rellax d-md-block" data-rellax-speed="0" style="bottom: -0.75rem; right: -0.75rem; width: 98%; height: 98%; z-index:0"></div>
          <div class="card">
            <figure class="card-img-top"><img class="img-fluid" src="{{$team->image()}}"  alt="" /></figure>
            <div class="card-body px-6 py-5">
              <h4 class="mb-1 text-center">{{$team->name}}</h4>
              <a class="mb-0 text-center" href="tel:+{{$team->phone}}"> {{$team->phone}}</a>
            </div>
            <!--/.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /div -->
      </div>

        @endforeach
      <!--/column -->

      <!--/column -->
    </div>
    <!--/.row -->
  </div>
  <!-- /.container -->
</section>
