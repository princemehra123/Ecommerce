<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','description'];
    public function allproduct()
    {
        return $this->hasMany(CategoryProduct::class,'category_id','id');
    }

    public function product()
    {
        return $this->hasOne(CategoryProduct::class,'category_id','id');
    }


}
