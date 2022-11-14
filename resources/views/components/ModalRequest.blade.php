<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel">طلب خدمة </h5>--}}
{{--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--            </div>--}}

            <div class="">
                <div class="row">
                    <form action="#" method="post" class="row contact_form_box" id="RequestProject">

                        <div class="col-lg-12">


                            <div class="col-lg-12">
                                <h4 id="contact_div" class="text-center"><i class="fa fa-envelope"></i> طلب خدمة </h4>
                                <div id="sendmessage" class="text-center"><i class="fa fa-check-circle"></i>
                                                                        &nbsp;{{ trans('frontLang.youMessageSent') }}</div>
                                    <div id="errormessage"
                                         class="text-center">{{ trans('frontLang.youMessageNotSent') }}</div>
                                    {{--  <p class="f_400 f_size_16 mb-0 text-center">ارسل بيانات وسوف يتم التواصل معك لاحقا</p> --}}

                                    <div class="col-lg-12">
                                        <div class="form-group text_box">
                                            <label>اختار الخدمة </label>
                                            <select class="form-control" name="ServiceName">
                                                <option value="دعاية واعلان">دعاية واعلان</option>
                                                <option value="تسوق">تسوق</option>
                                                <option value="انتاج مرئي وسمعي">انتاج مرئي وسمعي</option>
                                                <option value="تصوير">تصوير</option>
                                                <option value="برمجة">برمجة</option>
                                                <option value="التصميم">التصميم</option>
                                                <option value="ترجمة">ترجمة</option>
                                                <option value="اخرى ">اخرى</option>
                                            </select>


                                        </div>
                                        <div class="form-group text_box">
                                            <label>الإسم بالكامل</label>
                                            <input type="text" class="form-control" name="FullName" id="FullName"
                                                   placeholder="الإسم">
                                            {{--                                        {!! Form::text('FullName',"", array('placeholder' => trans('frontLang.yourName'),'id'=>'FullName')) !!}--}}


                                        </div>
                                        <div class="form-group text_box">
                                            <label>برجى كتابة بريدك الإلكتروني </label>
                                            {{--                                        {!! Form::email('email',"", array('placeholder' => trans('frontLang.yourEmail'),'id'=>'email','data-rule'=>'email')) !!}--}}
                                            <input type="email" class="form-control"  placeholder="البريد الإلكتروني"
                                                   name="email" id="email">

                                        </div>
                                        <div class="form-group text_box">
                                            <label>رقم الهاتف المحمول </label>
                                            {{--                                        {!! Form::text('phone',"", array('placeholder' => trans('frontLang.phone'),'id'=>'phone',--}}
                                            {{-- 'data-rule'=>'minlen:4','number','maxlength'=>10,'minlength'=>10)) !!}--}}
                                            <input placeholder="رقم الهاتف" class="form-control"  id="phone" data-rule="minlen:4" number=""
                                                   maxlength="10" minlength="10" name="phone" type="text" value="">


                                        </div>
                                        <div class="form-group text_box">
                                            <label>الأولوية</label>
                                            <select class="form-control" name="PriorityPhone">
                                                <option value="عالي">عالي</option>
                                                <option value="متوسط">متوسط</option>
                                                <option value="منخفض">منخفض</option>
                                            </select>


                                        </div>

                                        <div class="form-group text_box">
                                            <label>تفاصيل الطلب </label>
                                            {{--                                        {!! Form::textarea('OrderDetail','', array('placeholder' =>"تفاصيل  الطلب ",'class' => 'form-control','id'=>'OrderDetail','rows'=>'2','data-rule'=>'required')) !!}--}}
                                            <textarea placeholder="تفاصيل  الطلب " class="form-control" id="OrderDetail"
                                                      rows="2" data-rule="required" name="OrderDetail"
                                                      cols="50"></textarea>


                                        </div>
                                        {{--                                    <div class="form-group">--}}
                                        {{--                                        <label>إنجاز الطلب</label>--}}

                                        {{--                                        <div class="input-group">--}}

                                        {{--                                            {!! Form::text('FromDate',"", array('placeholder' =>"إنجاز الطلب من",'id'=>'FromDate','data-rule'=>'minlen:4',"class"=>"form-control date-picker")) !!}--}}

                                        {{--                                            <div class="input-group-addon">--}}
                                        {{--                                                <span class="input-group-text" id="">الى</span>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            {!! Form::text('ToDate','', array('placeholder' =>"إنجاز الطلب  الى",'id'=>'ToDate','data-rule'=>'required',"class"=>"form-control date-picker")) !!}--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}

                                        <div class="input-group">

                                            <input placeholder="إنجاز الطلب من" id="FromDate" data-rule="minlen:4"
                                                   class="form-control date-picker"
                                                   name="FromDate" type="date" value="">

                                            <div class="input-group-addon">
                                                <span class="input-group-text" id="">الى</span>
                                            </div>
                                            <input placeholder="إنجاز الطلب  الى" id="ToDate" data-rule="required"
                                                   class="form-control date-picker" name="ToDate"
                                                   type="date" value="">
                                        </div>


                                    </div>
                                </div>
                            </div>



{{--                            <div class="col-lg-12">--}}
{{--                                <div class="form-group mb-0 text-center">--}}
{{--                                    <button type="button" name="submit" class="btn_scroll btn_hover">إرسال الطلب--}}
{{--                                    </button>--}}
{{--                                    <button type="button" class="btn_scroll  btn-secondary" data-dismiss="modal">الغاء--}}
{{--                                    </button>--}}
{{--                                </div>--}}



                                <div class="modal-footer">
{{--                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                                    <button type="button" class="btn btn-primary">Save changes</button>--}}


                                    <button type="button" name="submit" class="btn_scroll btn_hover">إرسال الطلب
                                    </button>
                                    <button type="button" class="btn_scroll  btn-secondary btn-secondary"  data-bs-dismiss="modal">الغاء
                                    </button>
                                </div>
{{--                            </div>--}}


                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>


