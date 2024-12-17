<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
   protected $table = 'collections';
   protected $fillable = ['user_id','status', 'task_id','file_collection'];

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
