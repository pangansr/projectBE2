<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    protected $fillable = ['user_id']; // Các trường có thể được điền vào bằng phương thức fill
    
    // Xác định mối quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Xác định mối quan hệ với Product
    public function products()
{
    return $this->belongsToMany(Product::class, 'order_product');
}
}


