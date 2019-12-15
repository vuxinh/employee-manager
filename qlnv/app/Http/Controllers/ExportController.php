<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Excel;
use  Illuminate \ Support \ Facades \ Auth;


class ExportController extends Controller
{

   
    function excel()
    {
    
     $user = Auth::user();
     $department = $user->department[0];
     $listUser =  $department->user;
     $user_array[] = array('MSNV', 'Tên', 'Email', 'Chức vụ', 'Phòng ban');
     foreach($listUser as $user)
     {
      $user_array[] = array(
       'MSNV'  =>$user->id,
       'Tên'   => $user->name,
       'Email'    => $user->email,
       'Chức vụ'  =>$user->department[0]->pivot->position,
       'Phòng ban'   => $user->department[0]->name,
      );
     }
     //dd($user_array);
    Excel::create('User Data', function($excel) use ($user_array){//tạo file excel
        $excel->setTitle('User Data');
        $excel->sheet('User Data', function($sheet) use ($user_array){//tạo 1 sheet tên User Data trong file excel trên
        $sheet->fromArray($user_array);
        });
     })->download('xlsx');
    }
  
}
