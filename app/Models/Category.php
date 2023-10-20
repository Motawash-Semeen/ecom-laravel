<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id';

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
    public function subsubcategories(){
        return $this->hasMany(SubSubCategory::class, 'category_id', 'id');
    }
    public function products(){
        return $this->hasMany(Product::class,'category_id', 'id');
    }
}
