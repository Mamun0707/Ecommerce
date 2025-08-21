<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;
    protected $fillable = ['email'];

    // public static function isSubscribed($email)
    // {
    //     return self::where('email', $email)->exists();
    // }
}

