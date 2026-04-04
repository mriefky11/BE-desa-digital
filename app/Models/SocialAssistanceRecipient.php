<?php

namespace App\Models;

use App\traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialAssistanceRecipient extends Model
{
    /** @use HasFactory<\Database\Factories\SocialAssistanceRecipientFactory> */
    use HasFactory, SoftDeletes, UUID;

    protected $fillable = [
        'social_assistance_id',
        'head_of_family_id',
        'amount',
        'reason',
        'bank',
        'account_number',
        'proof',
        'status',
    ];

    public function headOfFamily(){
        return $this->belongsTo(HeadOfFamily::class);
    }

    public function socialAssistance(){
        return $this->belongsTo(SocialAssistance::class);
    }
}
