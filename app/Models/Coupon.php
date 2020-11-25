<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Coupon extends Model
{
    use HasFactory;
    protected $fillable =['user_id','code','type','value','percent_off','expiry'];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
