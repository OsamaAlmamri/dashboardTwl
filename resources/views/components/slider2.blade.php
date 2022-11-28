<section class="wrapper bg-light">
    <div class="container pb-14 pb-md-16">
        {{--        <div class="row mb-3">--}}
        {{--            <div class="col-md-10 col-xl-9 col-xxl-7 mx-auto text-center">--}}
        {{--                <h2 class="display-4 mb-3 px-lg-14 text-center"> الاعلانات</h2>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="position-relative">
            <div class="shape rounded-circle bg-soft-yellow rellax w-16 h-16" data-rellax-speed="1"
                 style="bottom: 0.5rem; right: -1.7rem;"></div>
            <div class="shape rounded-circle bg-line red rellax w-16 h-16" data-rellax-speed="1"
                 style="top: 0.5rem; left: -1.7rem;"></div>
            <div class="swiper-container dots-closer mb-6" data-margin="0" data-dots="true" data-items-xxl="1"
                 data-items-lg="1" data-items-md="1" data-items-xs="1">
                <div class="swiper">
                    <div class="swiper-wrapper">


                        @foreach($announcements as $announcement)
                            <div class="swiper-slide">
                                <div class="item-inner">

                                    {{--                                        <div class="card-body p-0">--}}
                                    {{--                                            <img class="p-2" src="/images/screenshots/{{$i}}.jpg" alt=""--}}
                                    {{--                                             data-fancybox="gallery"    />--}}
                                    {{--                                        </div>--}}
                                    <div class="card p-0">
                                        <div class="row" >

                                            <div
                                                class="slidet_content col-xl-7 col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                                <h2>  {{$announcement->title}}</h2>
                                                <p> {!! $announcement->description !!}</p>

{{--                                                <a href="#exampleModal" data-toggle="modal"--}}
{{--                                                   data-target="#exampleModal" class="slider_btn btn_hover">اطلب--}}
{{--                                                    الان</a>--}}

                                                @if($announcement->url!=null)
                                                <a
                                                    style="z-index: 999999"
                                                    href="{{$announcement->url}}" data-toggle="modal"

                                                    target="{{$announcement->open_url_in=='NEW_WINDOW'?'_blank':'_self'}}"
                                                   data-target="#exampleModal" class="slider_btn btn_hover">
                                                    عرض المزيد

                                                </a>
                                                    @endif
                                            </div>
                                            <div class="image_mockup col-xl-5 col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                                <div class="container-image">

                                                    <img class="p-2 watch" src="{{$announcement->image()}}" alt=""
                                                         data-fancybox="gallery"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
