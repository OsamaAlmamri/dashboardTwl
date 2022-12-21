<section class="wrapper bg-light dots_left_background">
    <div class="container py-14 py-md-16 text-center lines_right_background">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <h2 class="fs-15 text-uppercase text-muted mb-3 text-center">ماذا نقدم ؟</h2>
                <h3 class="display-4 mb-10 px-xl-10 text-center">قائمة الخدمات التي نقدمها لكم.</h3>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="position-relative">
            <div class="shape rounded-circle bg-soft-blue rellax w-16 h-16" data-rellax-speed="1"
                 style="bottom: -0.5rem; right: -2.2rem; z-index: 0;"></div>
            <div class="shape bg-dot yellow rellax w-16 h-17" data-rellax-speed="1"
                 style="top: -0.5rem; left: -2.5rem; z-index: 0;"></div>
            <div class="row gx-md-5 gy-5 text-center">
                @foreach($services as $service)
                <div class="col-md-6 col-xl-3">
                    <div class="card shadow-lg">
                        <div class="card-body text-center">
                            <img src=" {{$service->image()}}"
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
{{--                <!--/column -->--}}
{{--                <div class="col-md-6 col-xl-3">--}}
{{--                    <div class="card shadow-lg">--}}
{{--                        <div class="card-body text-center">--}}
{{--                            <img src="./assets/img/services/service-2.png"--}}
{{--                                 class="svg-inject icon-svg icon-svg-xxxl text-red mb-3" alt=""/>--}}
{{--                            <h4 class="text-center">--}}
{{--                                تصميم وبرمجة الويب</h4>--}}
{{--                            <p class="mb-2">--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <!--/.card-body text-center -->--}}
{{--                    </div>--}}
{{--                    <!--/.card -->--}}
{{--                </div>--}}
{{--                <!--/column -->--}}
{{--                <div class="col-md-6 col-xl-3">--}}
{{--                    <div class="card shadow-lg">--}}
{{--                        <div class="card-body text-center">--}}
{{--                            <img src="./assets/img/services/service-3.png"--}}
{{--                                 class="svg-inject icon-svg icon-svg-xxxl text-green mb-3" alt=""/>--}}
{{--                            <h4 class="text-center"> المحتوي الإبداعي</h4>--}}
{{--                            <p class="mb-2">--}}
{{--                            </p>--}}

{{--                        </div>--}}
{{--                        <!--/.card-body text-center -->--}}
{{--                    </div>--}}
{{--                    <!--/.card -->--}}
{{--                </div>--}}
{{--                <!--/column -->--}}
{{--                <div class="col-md-6 col-xl-3">--}}
{{--                    <div class="card shadow-lg">--}}
{{--                        <div class="card-body text-center">--}}
{{--                            <img src="./assets/img/services/service-4.png"--}}
{{--                                 class="svg-inject icon-svg icon-svg-xxxl text-blue mb-3" alt=""/>--}}
{{--                            <h4 class="text-center"> التسويق الإلكتروني</h4>--}}
{{--                            <p class="mb-2">--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <!--/.card-body text-center -->--}}
{{--                    </div>--}}
{{--                    <!--/.card -->--}}
{{--                </div>--}}
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.position-relative -->
    </div>
    <!-- /.container -->
</section>
