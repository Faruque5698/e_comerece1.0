<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
    public function sub_sub_category()
    {
        return $this->hasMany(Sub_sub_category::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
