@extends('layouts.admin')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">


            <form id="validate-form" class="row" enctype="multipart/form-data" method="POST"
                  action="{{route('admin.club_matches.update',$club_matche)}}"
            >
                @csrf
                @method("PUT")

                <div class="col-12 col-lg-8 p-0 main-box">
                    <div class="col-12 px-0">
                        <div class="col-12 px-3 py-3">
                            <span class="fas fa-info-circle"></span> تعديل
                        </div>
                        <div class="col-12 divider" style="min-height: 2px;"></div>
                    </div>
                    <div class="col-12 p-3 row">


                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                الاسم
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="name" required maxlength="190" class="form-control"
                                       value="{{$club_matche->name}}">
                            </div>
                        </div>



                        <div class="col-12 p-2">
                            <div class="col-12">
                                الصورة
                            </div>
                            <div class="col-12 pt-3">
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>
                            <div class="col-12 pt-3">
                                <img src="{{$club_matche->image()}}" style="width:100px">
                            </div>
                        </div>


                        {{--			<div class="col-12  p-2">--}}
                        {{--				<div class="col-12">--}}
                        {{--					الوصف--}}
                        {{--				</div>--}}
                        {{--				<div class="col-12 pt-3">--}}
                        {{--					<textarea name="description" class="editor with-file-explorer" >{{$club_matche->description}}</textarea>--}}
                        {{--				</div>--}}
                        {{--			</div>--}}

                        {{--			<div class="col-12 col-lg-12 p-2">--}}
                        {{--				<div class="col-12">--}}
                        {{--					ميتا الوصف--}}
                        {{--				</div>--}}
                        {{--				<div class="col-12 pt-3">--}}
                        {{--					<textarea name="meta_description" class="form-control" style="min-height:150px">{{$club_matche->meta_description}}</textarea>--}}
                        {{--				</div>--}}
                        {{--			</div>--}}
                    </div>

                </div>

                <div class="col-12 p-3">
                    <button class="btn btn-success" id="submitEvaluation">حفظ</button>
                </div>
            </form>
        </div>
    </div>
@endsection


