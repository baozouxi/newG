<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalUser extends Model
{

    protected $fillable = [
        'user_id',
        'hospital_id'
    ];

    protected $table = 'hospital_user';

    public $timestamps = false;

}
