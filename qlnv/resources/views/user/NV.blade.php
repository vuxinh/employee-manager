@extends('layouts.user')
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
		<div class="table-responsive">
			<p><a class="btn btn-primary" href="{{route('user.create') }}">Thêm mới</a></p>
			
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align :center">MSNV</th>
						<th style="text-align :center">Tên</th>
						<th style="text-align :center">Email </th>
						<th style="text-align :center">Chức vụ </th>
						<th style="text-align :center">Phòng ban</th>
						
					</tr>
				</thead>
				<tbody>
				<?php //Khởi tạo vòng lập foreach lấy giá vào bảng?>
				@foreach($listUser as $user)
					<tr>
						<td style="text-align :center">{{ $user->id }}</td>
						<td style="text-align :center">{{ $user->name }}</td>
						<td style="text-align :center">{{ $user->email }}</td>
						
						<td style="text-align :center">{{ $user->department[0]->pivot->position}}</td>
						<td style="text-align :center">{{ $department->name}}</td>
						
				@endforeach       
				</tbody>
			</table>
			<div class="export" style="display: block; text-align:center" >
				<a href ="{{ route('export_excel') }}" class="btn btn-info export" > Export file </a>
		   </div>
			
		</div>
		
	</div>
	
	
</div>




@endsection
