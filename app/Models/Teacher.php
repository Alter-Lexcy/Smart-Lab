<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable =[
        'name_teacher',
        'NIP',
        'email_teacher'
    ];

    public function Class(){
        return $this->hasMany(Classes::class);
    }
}
