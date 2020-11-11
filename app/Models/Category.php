<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Blog;
use App\Models\Product;
class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','type','is_published','language','order'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class,'category_products');
    }

    public function blogs(){
        return $this->belongsToMany(Blog::class,'category_blogs');
    }
}
