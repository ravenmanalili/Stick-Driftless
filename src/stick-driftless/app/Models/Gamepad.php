<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gamepad extends Model
{
    protected $table = 'gamepad';
    public $timestamps = false;

    protected $fillable = [
        'gamepad_name', 'platform', 'price', 'gamepad_image',
    ];
}
