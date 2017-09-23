<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Illness extends Model
{

    public $timestamps = false;

    protected  $fillable = ['name', 'sort', 'active', 'hospital_id'];


    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

}
