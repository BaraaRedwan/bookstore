<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

//use App\Traits\HasCompositeKeys;

class Cart extends Pivot
{
    use HasFactory;


    //use HasCompositeKeys;
    
    protected $table = 'carts';

    protected $fillable = ['user_id', 'product_id', 'quantity', 'price'];

    protected $primaryKey = ['user_id', 'product_id'];

    public $incrementing = false;

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

 


}
