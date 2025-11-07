<?php

namespace App\Models;

use App\traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeadOfFamily extends Model
{

    use SoftDeletes, UUID;

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

    public function familyMember(){
        return $this->hasMany(FamilyMember::class);
    }

    public function SocialAssistanceRecipient(){
        return $this->hasMany(SocialAssistanceRecipient::class);
    }
}
