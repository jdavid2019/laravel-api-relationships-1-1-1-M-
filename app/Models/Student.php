<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{

    //use HasFactory;
    protected $fillable = ['name', 'lastname', 'profile_id'];
    /**
     * A student is related to a Profile.
     *
     * Belongs to reference.
     * @return BelongsTo
     */
    public function profile() {
        return $this->belongsTo('App\Models\Profile');
    }

    /**
     * A student can be many licenses.
     *
     * @return HasMany
     */
    public function licenses() {
        return $this->hasMany('App\Models\License');
    }
}
