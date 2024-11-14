<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'collection_id',
        'mark_task'
    ];
    public function Collection(){
        return $this->belongsTo(Collection::class,'collection_id');
    }

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
