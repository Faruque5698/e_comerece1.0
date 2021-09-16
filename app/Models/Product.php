<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public function category(){

        return $this->belongsTo(Category::class,'cat_id');
    }
    public function brand(){

        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function sub_category(){
        return $this->belongsTo(SubCategory::class,'sub_cat_id');
    }
    public function sub_sub_category(){
        return $this->belongsTo(Sub_sub_category::class,'sub_sub_cat_id');
    }

    public function productGallery(){
        return $this->hasMany(ProductGallery::class);
    }

    public function slider(){
        return $this->hasOne(Slider::class);
    }
    public function stock(){
        return $this->hasOne(Stock::class);
    }
}
