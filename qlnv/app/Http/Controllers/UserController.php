<?php

namespace App\Http\Controllers;
use  Illuminate \ Support \ Facades \ Auth;
use Illuminate\Http\Request;
use App\User;
use App\Department;
use Illuminate \Support \ Facades \Mail;
use Alert;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *Hiển thị danh sách user 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listUser = User::where('role', 0)->paginate(2); 
       
        return view('admin.listNV', compact('listUser'));
    }

    
    //Form thêm nhân viên của root
    public function create()
    {
        $departments = Department::all();
        return view('admin.addNV', compact('departments'));
    }

   // thêm tk nhân viên vào csdl
    
    public function store(Request $request)
    {
       // return ($request);
        $user = new User();
        $user->name = $request->name;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $user->department()->attach(['department_id' =>$request->department],['position'=>$request-> position]);
        
        session()->flash('Thêm', "Đã thêm $request->name thành công");
       
        
      

      Mail::send('emails.email', array('email'=> $user->email,'name' => $user->name, 'password' => $request->password), function($message) use ($user) {
        $message->to($user->email)
                ->subject('Thông báo lập tài khoản');
      
    });
        return redirect()->route('user.list');

    }

   

    // hiển thị thông tin của user bằng tk root
    public function edit($id)
    {
        $user = User::find($id);
        $departments = Department::all();
        return view('admin.editNV',compact('user','departments'));
    }

  // update lại thông tin của user (QTV)
    public function update(Request $request)
    {
        
       $user =  User::find($request->id);
       foreach($user->department as $department){
       $user->department()->detach(['department_id' =>$department->id]);
       }
       $user->name = $request->name;
       $user->age = $request->age;
       $user->save();
      // $updateUser = $user->update(['name'=> $request->name], ['age'=> $request->age]);
       
       $user->department()->attach(['department_id' =>$request->department],['position'=>$request-> position]);
       session()->flash('Sửa', "Đã chỉnh sửa thông tin $request->name thành công");
       return redirect()->route('user.list');
    }

    //Xóa user (QTV)
    public function destroy($id)
    {
        $user = User::find($id);
        foreach($user->department as $department){
            $user->department()->detach(['department_id' =>$department->id]);
            }
        $user->delete();
        session()->flash('Xóa', "Đã xóa $user->name thành công");
        return redirect()->route('user.list');
    }

    //reset pw của nhân viên bởi tài khoản root
    public function reset(Request $request)
    {
       foreach($request->resetpw as $id)
       {
           $password = uniqid();
           $user = User::find($id);
           $user->password = bcrypt($password);
           $user->save();
       
       Mail::send('emails.mail', array('email'=> $user->email,'name' => $user->name, 'password' =>  $password), function($message) use ($user) {
        $message->to($user->email)
                ->subject('Thông báo thay đổi tài khoản');
        });
}
        session()->flash('Reset', "Đã thêm reset password thành công");
       return redirect()->route('user.list');

    }

    // hiển thị thông tin cá nhân người dùng
    public function editProfile()
    {
        $user = Auth::user();

        $departments = Department::all();
        return view('user.profile',compact('user','departments'));
    }
    //người dùng chỉnh sửa profile
    public function updateProfile(Request $request)
    {
        
       $user =  Auth::user();
       foreach($user->department as $department){
       $user->department()->detach(['department_id' =>$department->id]);
       }
       $user->name = $request->name;
       $user->age = $request->age;
       $user->save();
      // $updateUser = $user->update(['name'=> $request->name], ['age'=> $request->age]);
       
       $user->department()->attach(['department_id' =>$request->department],['position'=>$request-> position]);
       session()->flash('upadate_profile', "Đã chỉnh sửa thông tin $request->name thành công");
       return redirect()->route('editProfile');
    }

    // Hiển thị thông tin nhân viên cấp dưới 
    public function NV()
    {   $user = Auth::user();
        $department = $user->department[0];
        if($user->department[0]->pivot->position == 'Trưởng phòng'){
        $listUser =  $department->user;
        return view('user.NV', compact('listUser','department'));
        }
        return redirect()->route('user.index');
    }
    }

