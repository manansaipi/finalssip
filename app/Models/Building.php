<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
