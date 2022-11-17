<footer class="bg-soft-primary pt-5">
    {{--    <div class="container">--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-xl-11 col-xxl-10 mx-auto">--}}
    {{--                <div class="card image-wrapper bg-full bg-image bg-overlay bg-overlay-400 mt-n50p mb-n5"--}}
    {{--                     data-image-src="/assets/img/photos/4.png">--}}
    {{--                    <div--}}
    {{--                        class="card-body p-6 p-md-11 d-lg-flex flex-row align-items-lg-center justify-content-md-between text-center text-lg-start">--}}
    {{--                        <h3 class="display-6 mb-6 mb-lg-0 pe-lg-15 pe-xxl-18 text-white">كن ايجابيا وساعد في تطوير--}}
    {{--                            اللوحة أكثر في كل مرة تستخدمها في مشروع جديد.</h3>--}}
    {{--                        <a href="https://www.paypal.me/nafezlycom" class="btn btn-white rounded-pill mb-0 text-nowrap">قدم--}}
    {{--                            مساعدة</a>--}}
    {{--                    </div>--}}
    {{--                    <!--/.card-body -->--}}
    {{--                </div>--}}
    {{--                <!--/.card -->--}}
    {{--            </div>--}}
    {{--            <!-- /column -->--}}
    {{--        </div>--}}
    {{--        <!-- /.row -->--}}
    {{--    </div>--}}


    <div class="container pb-12 text-center">
        <div class="row mb-3">
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12">
                <div class="f_widget company_widget infocompany">
                    <a href="#" class="f-logo">
                        <img alt="" src="{{$settings->website_logo()}}"
                             srcset="{{$settings->website_logo()}}">

                        <div class="widget-wrap">
                            <h4 class="header_footer_bottom" dir="rtl">
                                {{$settings->footer_about}}

                            </h4>


                        </div>

                    </a></div>
                <a href="http://tatbeqakum.test" class="f-logo">
                </a></div>

            <div class="col-xl-4 col-lg-4 col-md-5 col-sm-5 col-xs-12"><a href="http://tatbeqakum.test"
                                                                          class="f-logo">
                </a>
                <div class="f_widget about-widget"><a href="http://tatbeqakum.test" class="f-logo">
                        <h3 class="f-title f_600 t_color f_size_25 mb_40">تواصل معنا</h3>
                    </a>
                    <div class="pp_contact_info"><a href="http://tatbeqakum.test" class="f-logo">
                            <div class="media pp_contact_item">
                                <div class="mmedia-body">
                                    <address>
                                        <p>
                                            {{$settings->address}}
                                            &nbsp;
                                        </p>
                                    </address>
                                </div>


                            </div>
                        </a>
                        <div class="media pp_contact_item"><a href="http://tatbeqakum.test" class="f-logo">


                            </a>
                            <div class="mmedia-body"><a href="http://tatbeqakum.test" class="f-logo">
                                </a><a href="mailto:{{$settings->contact_email}}">{{$settings->contact_email}}</a>
                                @if($settings->email2!=null)
                                    <a href="mailto:{{$settings->email2}}">{{$settings->email2}}</a>
                                @endif
                                @if($settings->email3!=null)
                                    <a href="mailto:{{$settings->email3}}">{{$settings->email3}}</a>
                                @endif
                            </div>
                        </div>

                        <div class="media pp_contact_item">


                            <div class="mmedia-body" dir="ltr">
                                <a href="call:{{$settings->phone}} "><span dir="ltr">{{$settings->phone}} </span></a>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-5 col-xs-12">
                <div class="f_widget about-widget pl_40">
                    <h3 class="f-title f_600 t_color f_size_25 mb_40">روابط سريعة</h3>
                    <ul class="list-unstyled f_list">
                        <li><a href="#index">الرئيسية</a></li>
                        <li><a href="#contact_us">احصائياتنا</a></li>
                        <li><a href="http://tatbeqakum.test/ourworks">الاعمال</a></li>
                        <li><a href="#">تواصل معنا</a></li>
                        <li><a href="#">التقييمات</a></li>
                    </ul>
                </div>
            </div>


        </div>
        <div class="row mt-n10 mt-lg-0">
            <div class="col-xl-10 mx-auto">


                {{--        <div class="row mb-3">--}}
                {{--          <div class="col-md-4">--}}
                {{--            <div class="widget">--}}
                {{--              <h4 class="widget-title">تأكد تماماً بأنها</h4>--}}
                {{--              <address>طورت بكل حب لأجلك </address>--}}
                {{--            </div>--}}
                {{--            <!-- /.widget -->--}}
                {{--          </div>--}}

                {{--          <!--/column -->--}}
                {{--          <div class="col-md-4">--}}
                {{--            <div class="widget">--}}
                {{--              <h4 class="widget-title">انضم إلى مجتمعنا</h4>--}}
                {{--              <p><a href="https://www.facebook.com/groups/web.developers.tips">مجتمع مطوري الويب</a></p>--}}
                {{--            </div>--}}
                {{--            <!-- /.widget -->--}}
                {{--          </div>--}}
                {{--          <!--/column -->--}}
                {{--          <div class="col-md-4">--}}
                {{--            <div class="widget">--}}
                {{--              <h4 class="widget-title">البريد الإلكتروني</h4>--}}
                {{--              <p><a href="mailto:PeterAyoub@nafezly.com" class="link-body">PeterAyoub@nafezly.com</a></p>--}}
                {{--            </div>--}}
                {{--            <!-- /.widget -->--}}
                {{--          </div>--}}
                {{--          <!--/column -->--}}
                {{--        </div>--}}
                <!--/.row -->
                <p class="text-center">© {{date('Y')}} <a href="#">{{$settings->website_name}}</a>.
                    جميع الحقوق محفوظة.</p>
                <nav class="nav social justify-content-center">
                    @if($settings->twitter_link!=null)
                        <a href="{{$settings->twitter_link}}"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if($settings->facebook_link!=null)
                        <a href="{{$settings->facebook_link}}"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if($settings->instagram_link!=null)
                        <a href="{{$settings->instagram_link}}"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if($settings->youtube_link!=null)
                        <a href="{{$settings->youtube_link}}"><i class="fab fa-youtube"></i></a>
                    @endif
                </nav>
                <!-- /.social -->
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</footer>
