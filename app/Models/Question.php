<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id',
        'question_text',
        'question_type',
    ];

    public function exam() {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    public function options() {
        return $this->hasMany(Option::class, 'question_id');
    }

    public function studentAnswers() {
        return $this->hasMany(StudentAnswer::class, 'question_id');
    }
}
