<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $primaryKey= 'id';
    public function division(){
        return $this->hasOne(Division::class,'id','division_id');
    }
    public function city(){
        return $this->hasOne(City::class,'id','city_id');
    }
    public function area(){
        return $this->hasOne(PostOffice::class,'id','area_id');
    }
}
