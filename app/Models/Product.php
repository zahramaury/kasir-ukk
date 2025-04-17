<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'image',
        'stok',
        'price'
    ];

    public function details(): HasMany{
        return $this->hasMany(SaleDetail::class, 'product_id');
    }
}


