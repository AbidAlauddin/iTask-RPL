<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reminder extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'reminder_time', 'is_completed'];

    // Relasi ke User (Reminder milik satu user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
