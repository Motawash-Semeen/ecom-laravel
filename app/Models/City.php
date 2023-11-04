<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = "cities";
    protected $primaryKey = "id";
    public function division()
    {
        return $this->hasOne(Division::class, 'id', 'division_id');
    }
}
