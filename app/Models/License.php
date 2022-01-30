<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class License extends Model
{
    protected $fillable = ['student_id', 'lesson_id'];

    /**
     * A license is related with one student.
     * @return BelongsTo
     */
    public function student() {
        return $this->belongsTo('App\Models\Student');
    }

    /**
     * A license is related with one student.
     * @return BelongsTo
     */
    public function lesson() {
        return $this->belongsTo('App\Models\Lesson');
    }
}
