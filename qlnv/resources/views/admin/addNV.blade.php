@extends('layouts.root')
@section('title','Thêm nhân viên')
@section('content')

    <div class="app-title">
        @if (session('status'))
        <div class="alert alert-info">{{session('status')}}</div>
        @endif

      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item"><a href="#">Sample Forms</a></li>
      </ul>
    </div>
    <div class="panel-body">
      <div class="col-md-6"  style="left:400px " >
        <div class="tile">
          <h3 class="tile-title" style="text-align:center">Thêm nhân viên</h3>
          <div class="tile-body">
            <form action = {{route('user.store')}} method = "POST">
              <div class="form-group">
                <label class="control-label" >Tên</label>
                <input class="form-control" type="text" placeholder="Enter full name" name = "name" required>
              </div>
              <div class="form-group">
                <label class="control-label">Email</label>
                <input class="form-control" type="email" placeholder="Enter email address"  name = "email" required>
              </div>
              <div class="form-group">
                <label class="control-label" >Password</label>
                <input class="form-control" type="password" placeholder="Enter password " name = "password" required>
              </div>
              <div class="form-group">
                <label class="control-label" >Tuổi</label>
                <input class="form-control" type="text" placeholder="Enter your age" name = "age" required>
              </div>
              <div class="form-group">
                  <label class="control-label" >Phòng ban</label>
                <select class="form-control m-bot15" name="department">
                    <option>----- Chọn phòng ban ----</option>
                  @if($departments->count() > 0)
                 @foreach($departments as $department)
                  <option value="{{$department->id}}">{{ucfirst($department->name)}}</option>
                  {{-- ucfirst: chuyển chữ đầu tiên thành chữ Hoa  --}}
                 @endForeach
                   @endif
               </select>
              </div>
              <div class="form-group">
                  <label class="control-label" >Chức vụ </label>
                <select class="form-control m-bot15" name="position">
                  <option>----- Chọn chức vụ ----</option>
                  <option value="Nhân viên">Nhân viên</option>
                  <option value="Trưởng phòng">Trưởng phòng</option>
                </select>
              </div>
              <div class="tile-footer">
                <button class="btn btn-primary" type="submit"  >
                      <i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                </div>
             
              @csrf
            </form>
          
      </div>
 @endsection