<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listDepartment = Department::paginate(2);
        return view('admin.listPB', compact('listDepartment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //  $departments = Department::all();
        return view('admin.addPB');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department = new Department();
        $department->name = $request->name;
        $department->save();
        session()->flash('Thêm', "Đã thêm $request->name thành công");
        return redirect()->route('PB.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
      //  $departments = Department::all();
        return view('admin.editPB',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
          
       $department =  Department::find($request->id);
       $name = $department->name;
       $department->name = $request->name;
       $department->save();
       session()->flash('Sửa', "Đã chỉnh sửa tên phòng $name thành $request->name");
       return redirect()->route('PB.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department =  Department::find($id);
        $users = $department->user;
        foreach($users as $user){
            $user->department()->detach(['department_id'=>$id]);
            $user->delete();
        }
        $department->delete();
        session()->flash('Xóa', "Đã xóa $department->name thành công");
        return redirect()->route('PB.list');
    }
}
