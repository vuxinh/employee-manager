@extends('layouts.root')
@section('title','Quản lý sinh viên')

@section('content')

<?php //Hiển thị thông báo thành công?>
<div class="page-header"><h4>Quản lý nhân viên</h4></div>



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

<form action = {{route('resetpw')}} method = "post">
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
		@endif

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
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php //Khởi tạo vòng lập foreach lấy giá vào bảng?>
				@foreach($listUser as $user)
					<tr>
						<td style="text-align :center">{{ $user->id }}</td>
						<td style="text-align :center">{{ $user->name }}</td>
						<td style="text-align :center">{{ $user->email }}</td>
						@if(count($user->department) > 0)
							@foreach($user->department as $department)
								<td style="text-align :center">{{ $department->pivot->position}}</td>
								<td style="text-align :center">{{ $department->name}}</td>
							@endforeach
						@else 
						<td style="text-align :center">null</td>
						<td style="text-align :center">null</td>
						@endif
						<td style="text-align :center"><a href = "editUser{{$user->id}}">Sửa</a></td>
						<td style="text-align :center"><a href = "deleteUser{{$user->id}}">Xóa</a></td>
						<td> <input type="checkbox" name="resetpw[{{$user->id}}]" value="{{$user->id}}"></td>
								
				@endforeach       
				</tbody>
			</table>
			
			  
			<div class = "col-sm-8 " style = "text-align : right; display: block">
				<button class="btn btn-primary" type="submit" > Reset</button>
			</div>
			{{$listUser->links()}}
		</div>
		
	</div>
	
	
</div>

@csrf
</form>
{{-- {{$listUser->links()}} --}}


@endsection
