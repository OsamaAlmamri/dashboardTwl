<section class="wrapper bg-light wrapper-border">
  <div class="container py-14 py-md-16">
    <h2 class="fs-15 text-uppercase text-muted text-center mb-8">قائمة لعملائنا</h2>
    <div class="swiper-container clients mb-0" data-margin="30" data-dots="false" data-autoplay-timeout="3000" data-items-xxl="7" data-items-xl="6" data-items-lg="5" data-items-md="4" data-items-xs="2">
      <div class="swiper">
        <div class="swiper-wrapper">
            @foreach($clients as $client)
          <div class="swiper-slide px-5"><img src="{{$client->image()}}" alt="" /></div>
            @endforeach

        </div>
        <!--/.swiper-wrapper -->
      </div>
      <!-- /.swiper -->
    </div>
    <!-- /.swiper-container -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->
