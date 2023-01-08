<section class="wrapper bg-light dots_left_background  ">
    <style type="text/css">
        .swiper-navigation {
            direction: ltr;
        }

    </style>
    <div class="overflow-hidden ">
        <div class="container py-5 py-md-6">
            <div class="row">
                <div class="col-xl-7 col-xxl-6 mx-auto text-center">
                    {{--          <i class="fal fa-pen-alt font-5"></i>--}}
                    <h2 class="display-5  text-center mt-2 mb-10"> المباريات.</h2>
                </div>
                <!--/column -->
            </div>


            <!--/.row -->
            <div class="swiper-container nav-bottom nav-color mb-10"
                 data-margin="30" data-dots="false" data-nav="true" data-items-lg="3" data-items-md="2"
                 data-items-xs="1">
                <div class="swiper overflow-visible pb-2">
                    <div class="swiper-wrapper">
                        @foreach($matches as $club_matche)

                            <div class="swiper-slide">
                                <article>
                                    <div class="card shadow-lg">
                                        <img class=" mx-auto rounded" src="{{$club_matche->league->image()}}" alt=""
                                             style="height:100px;width: 100px"/>
                                        <p class="text-center">{{$club_matche->league->name}}</p>

                                        <div class="card-body p-6">
                                            <div class="post-header">


                                                <div class="d-flex justify-content-around flex-row">

                                                    <img style="width: 70px ; height: 70px"
                                                         src="{{$club_matche->club1->image()}}">
                                                    <button class="btn btn-warning mt-3" style="color: #0e0d0c; height: 40px">
                                                        {{--                                                        ->setToStringFormat('i:s a')--}}
                                                        {{\Carbon::parse($club_matche->time)->translatedFormat('h:i a')}}
                                                    </button>
                                                    <img style="width: 70px ; height: 70px"
                                                         src="{{$club_matche->club2->image()}}">
                                                </div>

                                                <div class="d-flex justify-content-around flex-row my-5">
                                                    <p>{{$club_matche->club1->name}}</p>
                                                    <h4> ضد </h4>
                                                    <p>{{$club_matche->club2->name}}</p>
                                                </div>
                                            </div>
                                            <div class="post-footer">
                                                <ul class="post-meta d-flex flex-column mb-0">
                                                    <li class="text-center mb-3">   ال{{\Carbon::parse($club_matche->time)->translatedFormat('D , d M Y ')}}</li>
                                                    <li class="post-date">

		                      	<span>
                                    {{$club_matche->stadium->name}}
                                </span>

		                      	<span>
                                    في
                                    الساعة
                                </span>

		                      	<span>
                                      {{\Carbon::parse($club_matche->time)->translatedFormat('h:i a')}}
                                </span>

                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
