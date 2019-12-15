@extends('layouts.root')
@section('title','Thêm nhân viên')
@section('content')

    <div class="app-title">
      
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item"><a href="#">Sample Forms</a></li>
      </ul>
    </div>
    <div class="panel-body">
      <div class="col-md-6"  style="left:400px " >
        <div class="tile">
          <h3 class="tile-title" style="text-align:center">Chỉnh sửa thông tin </h3>
          <div class="tile-body">
            <form action = {{route('user.update')}} method = "POST">
                <input type="hidden" name="id" value="{{$user->id}}">
                
              <div class="form-group">
                <label class="control-label" >Tên</label>
                <input class="form-control" type="text" placeholder="Enter full name" name = "name" value="{{$user['name']}}">
              </div>
             
              <div class="form-group">
                <label class="control-label" >Tuổi</label>
                <input class="form-control" type="text" placeholder="Enter your age" name = "age" value="{{$user['age']}}">
              </div>
              <div class="form-group">
                 <label class="control-label" >Phòng ban</label>
                <select class="form-control m-bot15" name="department" value="{{$user['department']}}">
                    
                  @if($departments->count() > 0)
                    @foreach($departments as  $department)
                      @if($user->department[0]->id == $department->id)
                          <option value="{{ $department->id }}" selected>{{ $department->name }}</option>
                      @else
                          <option value="{{ $department->id  }}">{{ $department->name }}</option>
                      @endif
                      {{-- <option value="{{$department->id}}">{{ucfirst($department->name)}}</option> --}}
                      {{-- ucfirst: chuyển chữ đầu tiên thành chữ Hoa  --}}
                    @endForeach
                   @endif
               </select>
              </div>
              <div class="form-group">
                    <label class="control-label" >Chức vụ</label>
                <select class="form-control m-bot15" name="position" value="{{$user['position']}}">
                  {{-- <option>----- Chọn chức vụ ----</option> --}}
                  @if($user['position'] == 'Nhân viên')

                    <option value="Nhân viên" selected>Nhân viên</option>
                    <option value="Trưởng phòng">Trưởng phòng</option>
                  @else 
                    <option value="Nhân viên" >Nhân viên</option>
                    <option value="Trưởng phòng" selected>Trưởng phòng</option>
                  @endif
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