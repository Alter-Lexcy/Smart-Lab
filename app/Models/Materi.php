<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $fillable = [
        'subject_id',
        'classes_id',
        'file_materi',
        'description'
    ];

    public function Subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
    public function Classes(){
        return $this->belongsTo(Classes::class,'classes_id');
    }
    public function Task(){
        return $this->hasMany(Task::class);
    }
}
