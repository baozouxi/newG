<?php

namespace App\Models;

use App\Http\Traits\Date;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\HospitalScope;

class Patient extends Model
{
    use Date;

    public $fillable = [
        'name',
        'age',
        'gender',
        'medical_num',
        'phone',
        'doctor_id',
        'illness_id',
        'ad_id',
        'province',
        'city',
        'town',
        'user_id',
        'hospital_id',
        'book_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function illness()
    {
        return $this->belongsTo('App\Models\Illness');
    }


    public function tracks()
    {
        return $this->hasMany('App\Models\PatientTrack');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }


    public function expenses()
    {
        return $this->hasMany('App\Models\Expense');
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new HospitalScope());
    }


}
