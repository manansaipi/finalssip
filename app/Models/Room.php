<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    // public function user() <-- laravel will find in the table, is there any user_id in that table?
    // {
    //     return $this->belongsTo(User::class);
    // }
    //or
    public function owner() //<-- laravel will find in the table, is there any owner_id in the table? need to alias->user_id 
    {
        return $this->belongsTo(User::class, 'user_id'); //user_id == alias 
    }
}
