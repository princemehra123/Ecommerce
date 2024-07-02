<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['product_name','product_bio','price','discount','photo','afterdiscount'];
    public function allcategory()
    {
        return $this->hasMany(CategoryProduct::class,'product_id','id');
    }

    public function category()
    {
        return $this->hasOne(CategoryProduct::class,'product_id','id');
    }

    public function photos()
    {
        return $this->hasMany(ProductMedia::class,'product_id','id');
    }
    // public function AllCat()
    // {
    //     return $this->hasMany(Category::class,'id');
    // }

    public function tphotos()
    {
        return $this->hasMany(Thumbnail::class,'product_id','id');
    }
}
