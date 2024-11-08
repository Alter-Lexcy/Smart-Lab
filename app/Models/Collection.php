<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable =[
        'user_id',
        'task_id',
        'file_collecttion'
    ];

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function Task(){
        return $this->belongsTo(Task::class,'task_id');
    }
    public function Assessment(){
        return $this->hasMany(Assessment::class);
    }
}
