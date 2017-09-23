<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\HospitalScope;

class PatientTrack extends Model
{

    protected $fillable = ['next', 'patient_id', 'hospital_id', 'content', 'user_id'];

    protected $dates = ['created_at', 'update_at', 'next'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new HospitalScope());
    }

}
