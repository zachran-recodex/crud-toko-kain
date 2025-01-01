<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'stock_quantity',
        'price_per_yard',
        'type',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
