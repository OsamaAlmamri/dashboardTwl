@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">

		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-projects"></span> اعمالنا
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@permission('projects-create')
					<a href="{{route('admin.projects.create')}}">
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

						<th>الشعار</th>
						<th>العنوان</th>
                        <th>الرابط</th>
						<th>تحكم</th>
					</tr>
				</thead>
				<tbody>
					@foreach($projects as $project)
					<tr>
						<td>{{$project->id}}</td>


						<td><img src="{{$project->image()}}" style="width:40px"></td>
						<td>{{$project->title}}</td>

                        <td scope="col"><a href="{{$project->url}}" target="_block">{{$project->url}}</a></td>
						<td style="width: 180px;">
							@permission('projects-update')
							<a href="{{route('admin.projects.edit',$project)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-wrench "></span> تحكم
							</span>
							</a>
							@endpermission
							@permission('projects-delete')
							<form method="POST" action="{{route('admin.projects.destroy',$project)}}" class="d-inline-block">@csrf @method("DELETE")
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
			{{$projects->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
