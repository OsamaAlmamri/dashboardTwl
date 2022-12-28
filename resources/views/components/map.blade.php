<section class="wrapper bg-light pb-6 ">
  <div class="container py-5 py-md-6 ">
    <div class="row">
      <div class="col-xl-10 mx-auto">
        <div class="card">
          <div class="row gx-0">
            <div class="col-lg-6 align-self-stretch">
              <div class="map map-full rounded-top rounded-lg-start">
{{--              	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25387.23478654725!2d-122.06115399490332!3d37.309248660190086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb4571bd377ab%3A0x394d3fe1a3e178b4!2sCupertino%2C%20CA%2C%20USA!5e0!3m2!1sen!2str!4v1645437305701!5m2!1sen!2str" style="width:100%; height: 100%; border:0" allowfullscreen=""></iframe>--}}

             {!! $settings->map_ifream !!}
              </div>
              <!-- /.map -->
            </div>
            <!--/column -->
            <div class="col-lg-6">
              <div class="p-2">
                <div class="d-flex flex-row">
                  <div>
                    <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="fal fa-map-marker-alt" style="color: #f7ad42"></i> </div>
                  </div>
                  <div class="align-self-start justify-content-start">
                    <h5 class="mb-1">العنوان</h5>
                    <address>   {{$settings->address}}</address>
                  </div>
                </div>
                <!--/div -->
                <div class="d-flex flex-row">
                  <div>
                    <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="fal fa-phone" style="color: #f7ad42"></i> </div>
                  </div>
                  <div>
                    <h5 class="mb-1">الجوال</h5>
                    <p>   {{$settings->phone}} <br class="d-none d-md-block" />{{$settings->phone2}}</p>
                  </div>
                </div>
                <!--/div -->
                <div class="d-flex flex-row">
                  <div>
                    <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="fal fa-envelope-open" style="color: #f7ad42"></i> </div>
                  </div>
                  <div>
                    <h5 class="mb-1">البريد</h5>
                    <p class="mb-0"><a href="mailto:{{$settings->contact_email}}" class="link-body">{{$settings->contact_email}}</a></p>
                   @if($settings->email2!=null)
                    <p class="mb-0"><a href="mailto:{{$settings->email2}}" class="link-body">{{$settings->email2}}</a></p>
                      @endif
                      @if($settings->email3!=null)
                    <p class="mb-0"><a href="mailto:{{$settings->email3}}" class="link-body">{{$settings->email3}}</a></p>
                      @endif
                  </div>
                </div>
                <!--/div -->
              </div>
              <!--/div -->
            </div>
            <!--/column -->
          </div>
          <!--/.row -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
