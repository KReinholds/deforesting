<?php

namespace App\Models;


use App\Models\Category;
use App\Models\Offer;
use Illuminate\Support\Carbon;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'kadastrs',
        'platiba',
        'mervieniba',
        'pazimes',
        'pilseta',
        'tel',
        'email',
        'description',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getActiveUntilAttribute(): \Illuminate\Support\Carbon
    {
        return $this->created_at->copy()->addWeeks(2);
    }

    public function getIsActiveAttribute(): bool
    {
        return $this->status !== 'completed' && now()->lt($this->active_until);
    }

    // (optional) scope used in admin categories too
    public function scopeActive($q)
    {
        return $q->where('status', '!=', 'completed')
            ->where('created_at', '>', now()->subWeeks(2));
    }
}
