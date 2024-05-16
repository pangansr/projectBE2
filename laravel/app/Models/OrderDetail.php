<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======

    protected $table = 'order_detail'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];
    
>>>>>>> gfd
}
