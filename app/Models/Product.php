<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'sku', 'description'
    ];

    public function productImage()
    {
        return $this->hasOne(ProductImage::class);
    }

    public function productVariant()
    {
        return $this->hasMany(ProductVariant::class);
    }

}
