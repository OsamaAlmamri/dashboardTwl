@extends('layouts.admin')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">

            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-club_matches"></span> المباريات
                    </div>
                    <div class="col-12 col-lg-4 p-0">
                    </div>
                    <div class="col-12 col-lg-4 p-2 text-lg-end">
                        @permission('club-matchs-create')
                        <a href="{{route('admin.club_matches.create')}}">
                            <span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span>
                        </a>
                        @endpermission
                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>

            <div class="col-12 py-2 px-2 row">
                <div class="col-12 col-lg-4 p-2">
                    <form method="GET">
                        <input type="text" name="q" class="form-control" placeholder="بحث ... "
                               value="{{request()->get('q')}}">
                    </form>
                </div>
            </div>
            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" style="min-width:1100px;">


                    <table class="table table-bordered  table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الدوري</th>
                            <th>الملعب</th>
                            <th>  موعد المبارة</th>
                            <th> الفريق الاول</th>
                            <th> الفريق الثاني</th>
                            <th> النتيجة</th>
                            <th>تحكم</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($club_matches as $club_matche)
                            <tr>
                                <td>{{$club_matche->id}}</td>

                                <td>{{$club_matche->league->name}}</td>
                                <td>{{$club_matche->stadium->name}}</td>
                                <td>{{$club_matche->time}}</td>
                                <td>{{$club_matche->club1->name}}</td>
                                <td>{{$club_matche->club2->name}}</td>
                                <td>{{$club_matche->club1_result}} - {{$club_matche->club2_result}} </td>

                                <td style="width: 180px;">
                                    @permission('club-matchs-update')
                                    <a href="{{route('admin.club_matches.edit',$club_matche)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-wrench "></span> تحكم
							</span>
                                    </a>
                                    @endpermission
                                    @permission('club-matchs-delete')
                                    <form method="POST" action="{{route('admin.club_matches.destroy',$club_matche)}}"
                                          class="d-inline-block">@csrf @method("DELETE")
                                        <button class="btn  btn-outline-danger btn-sm font-1 mx-1"
                                                onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
                                            <span class="fas fa-trash "></span> حذف
                                        </button>
                                    </form>
                                    @endpermission
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 p-3">
                {{$club_matches->appends(request()->query())->render()}}
            </div>
        </div>
    </div>
@endsection
