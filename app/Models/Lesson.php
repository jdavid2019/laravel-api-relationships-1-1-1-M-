<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    use HasFactory;


    /**
     * A lesson is checking in many licenses.
     * @return HasMany
     */
    public function licenses() {
        return $this->hasMany('App\Models\License');
    }
}
