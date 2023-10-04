<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $primaryKey = "id";

    public function multiImgs()
    {
        return $this->hasMany(MultiImg::class, 'product_id', 'id');
    }
}
