<div class="col-md-6 col-lg-3 my-2">
    <div class="position-relative">
        <div class="shape rounded bg-soft-blue rellax d-md-block" data-rellax-speed="0"
             style="bottom: -0.75rem; right: -0.75rem; width: 98%; height: 98%; z-index:0"></div>
        <div class="card">
            <figure class="card-img-top"><img class="img-fluid" src="{{$team->image()}}" alt=""/>
            </figure>
            <div class="card-body px-6 py-5">
                <h4 class="mb-1 text-center">{{$team->name}}</h4>
                <div class="post-footer">
                    <ul class="post-meta d-flex mb-0">
                        <li class="post-date">

                            {{$team->number}}
                        </li>

                        <li class="post-comments">    {{trans('lang.'.$team->position)}} </li>
                    </ul>
                </div>
            </div>
            <!--/.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /div -->
</div>
