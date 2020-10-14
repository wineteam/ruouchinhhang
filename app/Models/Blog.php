<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','title','slug','description','thumbnail','content','view','day_up','is_published','especially','language'];


    public function users(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'category_blogs');
    }
}
