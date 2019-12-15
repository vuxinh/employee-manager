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
            <form action = {{route('PB.update')}} method = "POST">
                <input type="hidden" name="id" value="{{$department->id}}">
                
              <div class="form-group">
                <label class="control-label" >Tên</label>
                <input class="form-control" type="text" placeholder="Enter full name" name = "name" value="{{$department['name']}}">
              </div>
             
             
              <div class="tile-footer">
                <button class="btn btn-primary" type="submit"  >
                      <i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                </div>
             
              @csrf
            </form>
          
      </div>
 @endsection