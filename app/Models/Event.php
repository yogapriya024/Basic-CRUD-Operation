<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_name',
        'description',
        'user_id',
        'status',
        'created_by'
    ];

    const STATUS = [
        0 => 'In-Complete',
        1 => 'Complete',
        2 => 'In-Progress',
        3 => 'Initiated'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
