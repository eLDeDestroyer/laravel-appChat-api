<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = "friends";

    protected $fillable = [
        "name",
        "friend",
        "user_id",
        "room_id"
    ];

    public $timestamps = false;
}
