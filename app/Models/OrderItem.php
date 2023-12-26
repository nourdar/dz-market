<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'options',
        'unit_price'
    ];

    protected $casts = [
        'options' => 'array',
    ];


    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
