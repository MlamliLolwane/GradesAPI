<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradeLearner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'grade_id',
        'learner_id'
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
