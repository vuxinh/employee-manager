<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    protected $table = 'departments';
    public $timestamps = false;
    protected $fillable = [

    ];

    public function user(){
        return $this->belongsToMany('App\User','user_department','department_id','user_id')
        ->withPivot('position');

        
        // 3: khóa ngoài của model đang định nghĩa mối quan hệ(ở đây là user)
        // 4: Khóa ngoài model đang tham gia 
    }
}
