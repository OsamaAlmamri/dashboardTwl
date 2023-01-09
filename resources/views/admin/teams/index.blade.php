@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">

		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-teams2"></span> الفريق
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@permission('teams-create')
					<a href="{{route('admin.teams2.create')}}">
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
					<input type="text" name="q" class="form-control" placeholder="بحث ... " value="{{request()->get('q')}}">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;">


			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>الاسم</th>
						<th>الرقم</th>
						<th>الموقع</th>
						<th>الصورة</th>
						<th>تحكم</th>
					</tr>
				</thead>
				<tbody>
					@foreach($teams as $team)
					<tr>
						<td>{{$team->id}}</td>

						<td>{{$team->name}}</td>
						<td>{{$team->number}}</td>
						<td>{{trans('lang.'.$team->position)}}</td>
						<td><img src="{{$team->image()}}" style="width:40px"></td>

						<td style="width: 180px;">
							@permission('teams-update')
							<a href="{{route('admin.teams2.edit',$team)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-wrench "></span> تحكم
							</span>
							</a>
							@endpermission
							@permission('teams-delete')
							<form method="POST" action="{{route('admin.teams2.destroy',$team)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
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
			{{$teams->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
