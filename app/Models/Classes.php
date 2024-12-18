<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsToMany(User::class,'teacher_classes','classes_id','user_id');
    }

    public function users(){
        return $this->belongsToMany(User::class,'class_approvals','class_id','user_id');
    }

    public function Task(){
        return $this->belongsTo(Task::class);
    }

    public function materi(){
        return $this->hasMany(Materi::class);
    }
}
