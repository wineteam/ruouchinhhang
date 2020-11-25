<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable =['user_id','code','type','value','percent_off','expiry'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function discount($total)
    {
      if ($this->type == 'fixed') {
        return $this->value;
      }

      if($this->type == 'percent') {
        return round(($this->percent_off / 100) * $total);
      }
      return 0;
    }
}
