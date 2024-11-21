<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    protected $guarded = ['id'];

    public function Subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }

    public function Materi(){
        return $this->hasMany(Materi::class);
    }

    public function Task(){
        return $this->belongsTo(Task::class);
    }
}
