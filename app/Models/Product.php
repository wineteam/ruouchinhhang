<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','codeProduct','name','slug','thumbnail','price','size','vintage','detail','discount','nation','description','view','bought','language_id','is_published','especially','amount'];

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function tags(){
      return $this->hasMany(Tag::class);
    }
    public function extras($option_id){
      return $this->hasManyThrough(ExtraOption::class,ProductOption::class)->where('product_options.option_id','=',$option_id)->join('extras','extras.id','=','extra_id')->select('extras.*')->get();
    }
    public function categories(){
        return $this->belongsToMany(Category::class,'category_products');
    }

    public function language()
    {
      return $this->belongsTo(LanguageSwitch::class);
    }
    public function productRelation(){
      return $this->hasMany(ProductRelation::class);
    }
    public function pricePresent($option) : string{
      return  number_format($this->$option);
    }
}
