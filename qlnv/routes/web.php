<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::middleware(['login'])->group(function () {
    Route::get('user',function(){
        return view('user.user');
    })->name('user.index');
    Route::get('/', function () {
        return view('welcome');
    });
    // Chức năng của user
    Route::get('editProfile','UserController@editProfile')->name('editProfile');
    Route::post('updateProfile','UserController@updateProfile')->name('updateProfile');
    Route::get('xemTTCD','UserController@NV')->name('xemTTCD');
    // in danh sách nhân  viên ra file excel
    Route::get('exportFile', 'ExportController@excel')->name('export_excel');
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', function () {//trang đầu tiên vào sau khi login là admin

        return view('admin.admin') ;
        })->name('index');
        // Admin với user
        Route::get('listEmployee','UserController@index')->name('user.list');//Lấy ra danh sách nhân viên
        Route::get('createUser','UserController@create')->name('user.create');//Đưa ra form để điền thông tin thêm user
        Route::post('storeUser','UserController@store')->name('user.store');//Thêm user vào csdl
        Route::get('editUser{id}','UserController@edit')->name('user.edit');    //Hiển thị form để chỉnh sửa user
        Route::post('updateUser','UserController@update')->name('user.update'); //update lại thông tin user vào csdl
        Route::get('deleteUser{id}','UserController@destroy')->name('user.delete');
        // Admin với PB
        Route::get('listDepartment','DepartmentController@index')->name('PB.list');//Lấy ra danh sách nhân viên
        Route::get('createDepartment','DepartmentController@create')->name('PB.create');//Đưa ra form để điền thông tin thêm PB
        Route::post('storeDepartment','DepartmentController@store')->name('PB.store');//Thêm PB vào csdl
        Route::get('editDepartment{id}','DepartmentController@edit')->name('PB.edit');    //Hiển thị form để chỉnh sửa PB
        Route::post('updateDepartment','DepartmentController@update')->name('PB.update'); //update lại thông tin PB vào csdl
        Route::get('deleteDepartment{id}','DepartmentController@destroy')->name('PB.delete');
        //Reset pw
        Route::post('resetpw','UserController@reset')->name('resetpw');

});
});



Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');
// Đổi pass lần đầu đăng nhập
Route::get('changePassword','HomeController@showChangePasswordForm')->name('changePassword.get');
Route::post('changePassword', 'HomeController@changePassword')
        ->name('changePassword.post');





