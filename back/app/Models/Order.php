<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
            ->using(OrderProduct::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($order) {
            //dd($order);
        });
    }
}
