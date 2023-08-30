<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function solvedby()
    {
        return $this->belongsTo(User::class);
    }
    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
}
