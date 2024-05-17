<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetTokens extends Model
{
    use HasFactory;
    protected $fillable = ['email','token'];
    public function user(){
        return $this->hasOne(User::class,'email','email');
    }
    public function scopeCheckToken($que ,$token){
        return $que->where('token',$token)->firstOrFail();
    }
}
