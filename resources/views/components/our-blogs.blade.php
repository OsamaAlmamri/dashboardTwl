<section class="wrapper bg-light dots_left_background ">
  <style type="text/css">
    .swiper-navigation{
      direction: ltr;
    }

  </style>
  <div class="overflow-hidden lines_right_background">
    <div class="container py-14 py-md-16">
      <div class="row">
        <div class="col-xl-7 col-xxl-6 mx-auto text-center">
          <i class="fal fa-pen-alt font-5"></i>
          <h2 class="display-5 mt-12 text-center mt-2 mb-10">إليك أحدث اعمالنا.</h2>
        </div>
        <!--/column -->
      </div>




      <!--/.row -->
      <div class="swiper-container nav-bottom nav-color mb-14"
           data-margin="30" data-dots="false" data-nav="true" data-items-lg="3" data-items-md="2" data-items-xs="1">
        <div class="swiper overflow-visible pb-2">
          <div class="swiper-wrapper">
                @foreach($articles as $article)

                    <div class="swiper-slide">
                        <article>
                            <div class="card shadow-lg">
                                <figure class="card-img-top overlay overlay-1"><a href="{{route('article.show',$article)}}"> <img src="{{$article->main_image()}}" alt="" style="height:280px !important;object-fit: cover;vertical-align: middle;" /></a>
                                    <figcaption>
                                        <h5 class="from-top mb-0 text-center">عرض المزيد</h5>
                                    </figcaption>
                                </figure>
                                <div class="card-body p-6">
                                    <div class="post-header">
                                        <div class="post-category">
                                            @foreach($article->categories as $article_category)
                                                @if($loop->index<3)
                                                    <a href="{{route('category.show',$article_category)}}" class="hover" rel="category">{{$article_category->title}}</a>
                                                @endif
                                            @endforeach

                                        </div>
                                        <h3 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="{{route('article.show',$article)}}">{{$article->title}}</a></h3>
                                    </div>
                                    <div class="post-footer">
                                        <ul class="post-meta d-flex mb-0">
                                            <li class="post-date">
		                      	<span>
		                      		<i class="fal fa-clock"></i>  {{\Carbon::parse($article->created_at)->diffForHumans()}}
		                      	</span>
                                            </li>
{{--                                            @if($article->comments_count==null || $article->comments_count ==0)--}}
{{--                                                <li class="post-comments"><a href="#">  {{$article->comments_count}} <i class="fal fa-comment"></i> </a></li>--}}
{{--                                            @endif--}}

                                            @if($article->comments_count!=0)
                                                <li class="post-comments"><a href="#comments"><i class="fal fa-comment"></i> {{$article->comments_count}}<span> تعليقات</span></a></li>
                                            @endif
                                            @if($article->views!=0)
                                                <li class="post-comments"><a href="#comments"><i class="fas fa-fa-thin fa-eyes"></i> {{$article->views}}<span> مشاهدة</span></a></li>
                                            @endif
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
