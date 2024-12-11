<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
   protected $fillable = ['assesment_id', 'status', 'task_id'];

   public function task()
   {
      return $this->belongsTo(Task::class);
   }

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function assessment()
   {
      return $this->hasOne(Assessment::class);
   }
}
