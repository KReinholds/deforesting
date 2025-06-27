<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class OrderAttachment extends Model
{
    protected $fillable = ['order_id', 'file_path'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
