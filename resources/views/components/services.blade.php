<section dir="rtl" class="wrapper swiper-rtl bg-light ">
    <style type="text/css">
        .swiper-navigation {
            direction: rtl;
        }
    </style>
    <div class="overflow-hidden">
        <div class="container py-5 py-md-6 lines_right_background">
            <div class="row">
                <div class="col-md-10 mt-5 offset-md-1 col-lg-8 offset-lg-2">
                    <h2 class=" text-uppercase  mb-3 text-center">ماذا نقدم ؟</h2>
                    <h3 class="display-4 mb-10 px-xl-10 text-center" style="color: #0e0d0c !important;">قائمة الخدمات التي نقدمها لكم.</h3>
                </div>
                <!-- /column -->
            </div>

            <div class="swiper-container nav-bottom nav-color mb-14"
                 data-margin="30" data-dots="false" data-nav="true"
                 data-autoplay-timeout="3000"
                 data-items-xxl="3" data-items-xl="3" data-items-lg="3" data-items-md="2" data-items-xs="1">
                <div class="swiper overflow-visible pb-2">

                    <div class="swiper-wrapper">

                        @foreach($services as $service)
                            <div class="swiper-slide ">
                                <div class="card shadow-lg">
                                    <div class="card-body text-center">
                                        <img src=" {{$service->image()}}"
                                             style="height: 250px !important;
    object-fit: cover;
    vertical-align: middle;"
                                             class="svg-inject icon-svg icon-svg-xxxl text-yellow mb-3" alt=""/>
                                        <h4 class="text-center">
                                            {{$service->title}}
                                        </h4>
                                        <p class="mb-2">


                                        </p>
                                    </div>
                                    <!--/.card-body text-center -->
                                </div>
                                <!--/.card -->
                            </div>

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
