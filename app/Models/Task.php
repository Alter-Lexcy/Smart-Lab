<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'class_id',
        'subject_id',
        'materi_id',
        'user_id',
        'title_task',
        'file_task',
        'description_task',
        'date_collection'
    ];

    protected $casts = [
        'date_collection' => 'datetime',
    ];

    public function Classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
    public function Subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function Materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }
    public function Assessment()
    {
        return $this->hasMany(Assessment::class);
    }
    public function collections()
    {
        return $this->hasMany(Collection::class);
    }
}
