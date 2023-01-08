@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 ">


		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.club_matches.store')}}">
		@csrf

		<div class="col-12 col-lg-8 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span>	إضافة جديد
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
                <div class="col-12 col-lg-6 p-2">
                    <div class="col-12">
                        الدوري
                    </div>
                    <div class="col-12 pt-3">
                        <select class="form-control select2-select" name="league_id" required  size="1" style="height:30px;opacity: 0;">
                            @foreach($leagues as $league)
                                <option value="{{$league->id}}" @if(old('league_id')==$league->id) selected @endif>{{$league->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-12 col-lg-6 p-2">
                    <div class="col-12">
                        الملعب
                    </div>
                    <div class="col-12 pt-3">
                        <select class="form-control select2-select" name="stadium_id" required  size="1" style="height:30px;opacity: 0;">
                            @foreach($stadia as $stadium)
                                <option value="{{$stadium->id}}" @if(old('stadium_id')==$stadium->id) selected @endif>{{$stadium->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-12 col-lg-6 p-2">
                    <div class="col-12">
                        الفريق الاول
                    </div>
                    <div class="col-12 pt-3">
                        <select class="form-control select2-select" name="club1_id" required  size="1" style="height:30px;opacity: 0;">
                            @foreach($clubs as $club)
                                <option value="{{$club->id}}" @if(old('club1_id')==$club->id) selected @endif>{{$club->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>



                <div class="col-12 col-lg-6 p-2">
                    <div class="col-12">
                        الفريق الثاني
                    </div>
                    <div class="col-12 pt-3">
                        <select class="form-control select2-select" name="club2_id" required  size="1" style="height:30px;opacity: 0;">
                            @foreach($clubs as $club)
                                <option value="{{$club->id}}" @if(old('club2_id')==$club->id) selected @endif>{{$club->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-12 col-lg-12 p-2">
                    <div class="col-12">
                موعد المبارة
                    </div>
                    <div class="col-12 pt-3">
                        <input type="datetime-local" name="time"class="form-control" value="{{old('time')}}" >

                    </div>
                </div>

                <div class="col-12 col-lg-6 p-2">
                    <div class="col-12">
                        نتيجة       الفريق الاول
                    </div>
                    <div class="col-12 pt-3">
                        <input type="number" name="club1_result"   maxlength="190" class="form-control" value="{{old('club1_result')}}" >

                    </div>
                </div>

                <div class="col-12 col-lg-6 p-2">
                    <div class="col-12">
                        نتيجة       الفريق الثاني
                    </div>
                    <div class="col-12 pt-3">
                        <input type="number" name="club2_result"   maxlength="190" class="form-control" value="{{old('club2_result')}}" >

                    </div>
                </div>




{{--			<div class="col-12  p-2">--}}
{{--				<div class="col-12">--}}
{{--					الوصف--}}
{{--				</div>--}}
{{--				<div class="col-12 pt-3">--}}
{{--					<textarea name="description" class="editor with-file-explorer" >{{old('description')}}</textarea>--}}
{{--				</div>--}}
{{--			</div>--}}

{{--			<div class="col-12 col-lg-12 p-2">--}}
{{--				<div class="col-12">--}}
{{--					ميتا الوصف--}}
{{--				</div>--}}
{{--				<div class="col-12 pt-3">--}}
{{--					<textarea name="meta_description" class="form-control" style="min-height:150px">{{old('meta_description')}}</textarea>--}}
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
