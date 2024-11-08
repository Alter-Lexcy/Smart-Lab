<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $fillable =[
        'class_id',
        'title',
        'description',
        'file_module'
    ];

    public function Class(){
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
