<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriClass extends Model
{
    protected $fillable =[
        'class_id',
        'materi_id'
    ];

    public function class(){
        return $this->belongsTo(Classes::class,'class_id');
    }
    public function materi(){
        return $this->belongsTo(Materi::class,'materi_id');
    }
}
