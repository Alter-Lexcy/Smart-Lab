<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'collection_id',
        'user_id',
        'status',
        'mark_task'
    ];


    public function User()
    {
        return $this->belongsTo(User::class, 'user_id')->whereDoesntHave('roles', function ($query) {
            $query->where('name', '!=', 'Murid');
        });
    }
    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function task()
    {
        return $this->hasOneThrough(Task::class, Collection::class, 'id', 'id', 'collection_id', 'task_id');
    }

    public function classes()
    {
        return Classes::whereHas('users', function ($query) {
            $query->where('users.id', $this->user_id);
        });
    }

}
