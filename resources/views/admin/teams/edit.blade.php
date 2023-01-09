@extends('layouts.admin')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">


            <form id="validate-form" class="row" enctype="multipart/form-data" method="POST"
                  action="{{route('admin.teams2.update',$team)}}"
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
                                       value="{{$team->name}}">
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 p-2">
                            <div class="col-12">
                                الرقم
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="number" required maxlength="190" class="form-control"
                                       value="{{$team->number}}">
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 p-2">
                            <div class="col-12">
                                الموقع
                            </div>
                            <div class="col-12 pt-3">
                                <select class="form-control select2-select" name="position" required  size="1" style="height:30px;opacity: 0;">
                                    @foreach($positions as $position)
                                        <option value="{{$position}}" @if($team->position==$position) selected @endif>{{trans('lang.'.$position)}}</option>
                                    @endforeach
                                </select>
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
                                <img src="{{$team->image()}}" style="width:100px">
                            </div>
                        </div>


                        {{--			<div class="col-12  p-2">--}}
                        {{--				<div class="col-12">--}}
                        {{--					الوصف--}}
                        {{--				</div>--}}
                        {{--				<div class="col-12 pt-3">--}}
                        {{--					<textarea name="description" class="editor with-file-explorer" >{{$team->description}}</textarea>--}}
                        {{--				</div>--}}
                        {{--			</div>--}}

                        {{--			<div class="col-12 col-lg-12 p-2">--}}
                        {{--				<div class="col-12">--}}
                        {{--					ميتا الوصف--}}
                        {{--				</div>--}}
                        {{--				<div class="col-12 pt-3">--}}
                        {{--					<textarea name="meta_description" class="form-control" style="min-height:150px">{{$team->meta_description}}</textarea>--}}
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


