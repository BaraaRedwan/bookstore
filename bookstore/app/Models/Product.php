<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    //use SoftDeletes;


    //
    protected $fillable = ['name', 'description', 'category_id', 'image', 'price'];

    protected $hidden = [
        //'price',
    ];

    protected $appends = [
        'category_name', 'full_name'
    ];

    

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->price;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')
            ->withDefault([
                'name' => 'No Category',
            ]);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }


}
