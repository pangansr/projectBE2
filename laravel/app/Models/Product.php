<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock_quantity',
        'category_id',
        'image1',
        'image2',
        'image3'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorities', 'id_product', 'user_id');
    }
}
