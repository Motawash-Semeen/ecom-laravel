<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostOffice extends Model
{
    use HasFactory;
    protected $table = "post_offices";
    protected $primaryKey = "id";

    public function division()
    {
        return $this->hasOne(Division::class, 'id', 'division_id');
    }
    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
