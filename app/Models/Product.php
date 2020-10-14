<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
class Product extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','codeProduct','name','slug','price','discount','nation','description','view','bought','language','is_published','especially','amount'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'category_products');
    }
}
