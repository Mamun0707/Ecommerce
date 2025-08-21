<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'total_price', 'billing_address', 'status',];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public function items()
    // {
    //     return $this->hasMany(CheckoutItem::class);
    // }

    // public function isPaid()
    // {
    //     return $this->status === 'paid';
    // }
}

