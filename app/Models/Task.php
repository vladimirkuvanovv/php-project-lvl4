<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status_id',
        'created_by_id',
        'assigned_to_id',
        'description'
    ];

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }

    public function label()
    {
        return $this->belongsToMany(Label::class)->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(TaskComment::class);
    }
}