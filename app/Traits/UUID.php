<?php

namespace App\traits;

use Illuminate\Support\Str;

trait UUID
{
    public function initializeUUID(): void
    {
        $this->incrementing = false;
        $this->keyType = 'string';
    }

    public static function bootUUID(): void
    {
        static::creating(function ($model) {
            if ($model->getKey() === null) {
                $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
            }
        });
    }
}




