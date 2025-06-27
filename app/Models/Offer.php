<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'price',
        'currency',
        'extra_costs',
        'extra_costs_info',
        'start_date',
        'deadline',
        'comments',
        'status',
        'agreed_to_terms',
        'attachment',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
