@extends('layouts.admin')
@section('content')
    <div class="col-12 py-0 px-3 row">
        <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
            <div class="col-12 px-3">
                <h4>تعديل  الاعلان</h4>
            </div>
            <div class="col-12 col-lg-9 px-3 py-5">
                <form class="col-12" method="POST" action="{{route('admin.announcements.update',$announcement)}}"
                      enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row p-0 main-box">
                    <div class="col-12  p-2">
                        <div class="col-12">
                            العنوان
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="title" required maxlength="190" class="form-control"
                                   value="{{old('title',$announcement)}}">
                        </div>
                    </div>
                    <div class="col-12  p-2">
                        <div class="col-12">
                            الوصف
                        </div>
                        <div class="col-12 pt-3">
                            <textarea name="description"
                                      class="editor with-file-explorer">{{old('description',$announcement)}}</textarea>
                        </div>
                    </div>


                    <div class="col-12 col-lg-5 p-2">
                        <div class="col-12">
                            تاريخ البداية
                        </div>
                        <div class="col-12 pt-3">
                            <input type="datetime-local" name="start_date" required class="form-control"
                                   value="{{old('start_date',$announcement)}}}">
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            تاريخ الإنتهاء
                        </div>
                        <div class="col-12 pt-3">
                            <input type="datetime-local" name="end_date" required class="form-control"
                                   value="{{old('end_date',$announcement)}}">
                        </div>
                    </div>

                    <div class="col-12 col-md-4 p-2">
                        <div class="col-12">
                            فتح الرابط في نافذة جديدة
                        </div>
                        <div class="col-12 pt-3">
                            <div class="form-switch">
                                <input name="open_url_in" class="form-check-input" type="checkbox"
                                       id="flexSwitchCheckDefault"
                                       {{old('open_url_in',$announcement)=="NEW_WINDOW"?"checked":""}} style="width: 50px;height:25px"
                                       value="NEW_WINDOW">
                            </div>
                        </div>
                    </div>

                    <div class="col-12  col-md-8 p-2">
                        <div class="col-12">
                            الرابط
                        </div>
                        <div class="col-12 pt-3">
                            <input type="url" name="url" required class="form-control"
                                   value="{{old('url',$announcement)}}">
                        </div>
                    </div>

                    <div class="col-12 p-2">
                        <div class="col-12">
                            الصورة
                        </div>
                        <div class="col-12 pt-3">
                            <input type="file" name="image" class="form-control" accept="image/*">

                            <div class="col-12 py-2">
                                <img src="{{$announcement->image()}}" style="width:180px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 p-3">
                        <button class="btn pb-2 px-4" style="background: #ffa725;border-radius: 0px;color: #fff ">
                            إعتماد
                        </button>
                    </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection
