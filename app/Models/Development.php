<?php

namespace App\Models;

use App\traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Development extends Model
{
    use SoftDeletes, UUID;

    protected $fillable = [
        'thumbnail',
        'name',
        'description',
        'person_in_charge',
        'start_date',
        'end_date',
        'amount',
        'status'
    ];

    public function developmentApplicantpment(){
        return $this->hasMany(DevelopmentApplicant::class);
    }
}
