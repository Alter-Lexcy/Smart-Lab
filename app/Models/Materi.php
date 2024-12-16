<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $fillable = [
        'classes_id',
        'subject_id',
        'title_materi',
        'file_materi',
        'description',
        'user_id'
    ];

    public function Classes(){
        return $this->belongsTo(Classes::class,'classes_id');
    }
    public function Task(){
        return $this->hasMany(Task::class);
    }
}
