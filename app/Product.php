<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'category_id', 'description', 'price', 'quantity', 'image', 'product_code',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function wishlist()
    {

        return $this->hasMany(Wishlist::class);
    }
}
