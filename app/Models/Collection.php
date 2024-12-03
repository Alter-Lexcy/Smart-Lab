<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = ['assesment_id','status','task_id'];

    public function assesment(){
       return $this->belongsTo(Assessment::class);
    }

    public function task(){
       return $this->belongsTo(Task::class);
    }

}