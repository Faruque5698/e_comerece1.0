<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_sub_category extends Model
{
    use HasFactory;
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class, 'sub_cat_id');

    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
