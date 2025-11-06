<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    protected $fillable = [
        'head_of_family_id',
        'user_id',
        'profile_picture',
        'indetify_number',
        'gender',
        'date_of_birth',
        'phone_number',
        'occupation',
        'marital_status',
        'relation',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function headOfFamily(){
        return $this->belongsTo(HeadOfFamily::class);
    }
}
