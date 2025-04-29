<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gamepad extends Model
{
    protected $table = 'gamepad';
    protected $primaryKey = 'gamepad_id';
    public $timestamps = false;

    protected $fillable = [
        'gamepad_name', 'platform', 'price', 'gamepad_image'
    ];
    
    protected $casts = [
        'price' => 'float',
        'gamepad_id' => 'integer'
    ];
}