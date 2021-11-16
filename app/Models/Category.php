<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function child(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');

    }
    use HasFactory;
}
