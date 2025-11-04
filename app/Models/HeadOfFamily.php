<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeadOfFamily extends Model
{
    protected $fillable = [
        'user_id',
        'profile_picture',
        'indetify_number',
        'gender',
        'date_of_birth',
        'phone_number',
        'occupation',
        'marital_status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
