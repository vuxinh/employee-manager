@extends('layouts.root')

<main class="app-content">
     
  <div class="row">
     <div class="col-md-6 col-lg-4"> {{--mmd, lg, ms là tương thích vs các loại màn hình  --}}
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
        <div class="info">
          <h4>Quản lý nhân viên </h4>
          
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-building-o fa-3x"></i>
        <div class="info">
          <h4>Quản lý phòng ban</h4>
          
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-user fa-3x"></i>
        <div class="info">
          <h4>Tài khoản nhân viên</h4>
          
        </div>
      </div>
    </div>
    
  
</main>