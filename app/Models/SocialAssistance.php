<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAssistance extends Model
{
    protected $fillable = [
        'thumbnail',
        'name',
        'category',
        'amount',
        'provider',
        'description',
        'is_available',
    ];
}
