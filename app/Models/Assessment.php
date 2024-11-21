<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'task_id',
        'user_id',
        'mark_task'
    ];


    public function User() {
        return $this->belongsTo(User::class, 'user_id')->whereDoesntHave('roles', function ($query) {
            $query->where('name', '!=', 'Murid');
        });
    }

    public function Task(){
        return $this->belongsTo(Task::class,'task_id');
    }
}
