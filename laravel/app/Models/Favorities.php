<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorities extends Model
{
    use HasFactory;

    protected $table = 'favorities';

    protected $primaryKey = 'favorite_id';

    public $incrementing = true;

    protected $fillable = [
        'id_product',
        'user_id',
        'favorite_name',
        'favorite_description'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'favorities', 'favorite_id', 'user_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'favorities', 'favorite_id', 'id_product');
    }
   
}
