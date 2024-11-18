<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    protected $fillable = [
        'subject_id',
        'name_class',
        'description',
    ];

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
