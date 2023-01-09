<section class="wrapper bg-light">
    <style type="text/css">
        .settings-tab-opener {
            cursor: pointer;
            width: 80px;
            height: 45px;
        }

        .settings-tab-opener.active {
            border-bottom: 1px solid #00a6df;
        }

        .taber:not(.active) {
            display: none;
        }

    </style>
    <div class="container py-14 py-md-16">
        <div class="row mb-3">
            <div class="col-md-10 col-lg-12 col-xl-10 col-xxl-9 mx-auto text-center">
                <h2 class="fs-15 text-uppercase  mb-3 text-center">فريقنا</h2>
                <div class="col-12 row">
                    <div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener active"
                         data-opentab="all-tab"> الكل
                    </div>
                    @foreach($positions as $k=>$position)

                        <div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener"
                             data-opentab="{{$position}}-tab"> {{trans('lang.'.$position)}}
                        </div>
                    @endforeach


                </div>
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
        <div class="row">
            <div class="row grid-view taber  active gx-md-8 gx-xl-10 gy-8 gy-lg-0" id="all-tab">
                @foreach($teams as $team)
                    @include('components.player')
                @endforeach

            </div>
            @foreach($positions as $k=>$position)
                <div class="row grid-view taber  gx-md-8 gx-xl-10 gy-8 gy-lg-0" id="{{$position}}-tab">
                    @foreach($teams as $team)
                        @if($team->position==$position)
                        @include('components.player')
                        @endif
                    @endforeach

                </div>
            @endforeach
            <!--/.row -->
        </div>
    </div>

    <!-- /.container -->
</section>

