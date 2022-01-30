<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Profile extends Model
{
   // use HasFactory;

    protected $fillable = ['user', 'password'];

    /**
     * Use to access student data.
     * @return HasOne
     */
    public function student() {
        return $this->hasOne('App\Models\Student');
    }
}
