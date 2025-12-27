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

    public function scopeSearch($query, $search)
    {
        return $query->whereHaswhere(
            'user',
            function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('gender', 'like', '%' . $search . '%')
                    ->orWhere('phone_number', 'like', '%' . $search . '%')
                    ->orWhere('occupation', 'like', '%' . $search . '%')
                    ->orWhere('marital_status', 'like', '%' . $search . '%');
            }
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function familyMember()
    {
        return $this->hasMany(FamilyMember::class);
    }

    public function socialAssistanceRecipient()
    {
        return $this->hasMany(SocialAssistanceRecipient::class);
    }

    public function eventParticipant()
    {
        return $this->hasMany(EventParticipant::class);
    }
}
