@extends('layouts.root')
@section('title','Quản lý sinh viên')

@section('content')

<?php //Hiển thị thông báo thành công?>
<div class="page-header"><h4>Quản lý nhân viên</h4></div>

@if ( Session::has('success') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif

<?php //Hiển thị thông báo lỗi?>
@if ( Session::has('error') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif


<div class="row">
	<div class="col-xs-8 col-sm-8 col-md-8" style="left:250px ">
		@if ( Session::has('Thêm') )
			<div class="alert alert-success alert-dismissible" role="alert" style = "text-align: center">
				<strong>{{ Session::get('Thêm') }}</strong>
			</div>
			@elseif( Session::has('Sửa') )
			<div class="alert alert-success alert-dismissible" role="alert" style = "text-align: center">
				<strong>{{ Session::get('Sửa') }}</strong>
			</div>
			@elseif(Session::has('Xóa'))
			<div class="alert alert-success alert-dismissible" role="alert" style = "text-align: center">
				<strong>{{ Session::get('Xóa') }}</strong>
			</div>
			@elseif(Session::has('Reset'))
			<div class="alert alert-success alert-dismissible" role="alert" style = "text-align: center">
				<strong>{{ Session::get('Reset') }}</strong>
			</div>
		@endif
		<div class="table-responsive">
			<p><a class="btn btn-primary" href="{{route('PB.create') }}">Thêm mới</a></p>
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align :center">Mã phòng ban</th>
						<th  style="text-align :center">Tên phòng ban </th>
						<th  style="text-align :center"> Số nhân viên </th>
						
					</tr>
				</thead>
				<tbody>
				<?php //Khởi tạo vòng lập foreach lấy giá vào bảng?>
				@foreach($listDepartment as $department)
					<tr>
						<td style="text-align :center">{{ $department->id }}</td>
						<td style="text-align :center">{{ $department->name }}</td>
						<td style="text-align :center">{{ $department->user->count() }}</td>
						{{-- @if($user->department)
							@foreach($user->department as $department)
								<td>{{$department->pivot->position}}</td>
								<td>{{$department->name}}</td>
							@endforeach
						@endif --}}
						<td style="text-align :center"><a href = "editDepartment{{$department->id}}">Sửa</a></td>
						<td style="text-align :center"><a href = "deleteDepartment{{$department->id}}">Xóa</a></td>
								
				@endforeach       
				</tbody>
			</table>
			{{$listDepartment->links()}}   
		</div>
	</div>
</div>

@endsection