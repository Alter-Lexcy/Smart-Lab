<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable =[
        'class_id',
        'title_task',
        'description_task',
        'date_task'
    ];
    public function Class(){
        return $this->belongsTo(Classes::class,'class_id');
    }
    public function Collection(){{
        return $this->hasMany(Collection::class);
    }}
}
