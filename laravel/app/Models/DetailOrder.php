<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'order_details'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

}
