<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name_subject'
    ];

    public function Classes(){
        return $this->hasMany(Classes::class);
    }
    public function Materi(){
        return $this->hasMany(Materi::class);
    }

    public function Task(){
        return $this->hasMany(Task::class);
    }
}
