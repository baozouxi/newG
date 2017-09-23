<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['active', 'name', 'sort'];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany('App\User');
    }


    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }
}
