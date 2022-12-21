<section class="wrapper bg-light lines_left_background">
    <style type="text/css">
        .swiper-navigation {
            direction: ltr;
        }
    </style>
    <div class="overflow-hidden">
        <div class="container py-14 py-md-16">
            <div class="row">
                <div class="col-xl-7 col-xxl-6 mx-auto text-center">
{{--                    <i class="fal fa-pen-alt font-5"></i>--}}
                    <h2 class="display-5 text-center mt-2 mb-10">قائمة لعملائنا</h2>
                </div>
                <!--/column -->
            </div>

            <div class="swiper-container nav-bottom nav-color mb-14"
                 data-margin="30" data-dots="false" data-nav="true"
                 data-autoplay-timeout="3000"
                 data-items-xxl="4" data-items-xl="3" data-items-lg="3" data-items-md="2" data-items-xs="1">
                <div class="swiper overflow-visible pb-2">

                    <div class="swiper-wrapper">
                        @foreach($clients as $client)
                            <div class="swiper-slide px-5"><img src="{{$client->image()}}" alt=""/></div>
                        @endforeach

                    </div>
                    {{--          <div class="swiper-button-next"></div>--}}
                    {{--          <div class="swiper-button-prev"></div>--}}
                    {{--          <div class="swiper-pagination"></div>--}}

                    <!--/.swiper-wrapper -->
                </div>
                <!-- /.swiper -->
            </div>
        </div>
    </div>
</section>
