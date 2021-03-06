<?php

namespace App\Models;

use App\Http\Traits\Date;
use App\Scopes\HospitalScope;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use Date;

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'hospital_id',
        'user_id',
        'dose',
        'check_price',
        'drug_price',
        'cure_price',
        'hospital_price',
        'content'
    ];


    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::addGlobalScope(new HospitalScope());
    }


}
