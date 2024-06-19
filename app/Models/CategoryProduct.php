<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $fillable=['category_id','product_id'];

    public function productIds()
    {
        return $this->belongsToMany(Product::class,'product_id','id');
    }

    public function productId()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }


    public function categoryIds()
    {
        return $this->belongsToMany(Category::class,'category_id','id');
    }

    public function categoryId()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
