<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id',
        'question_id',
        'student_id',
        'answer_text',
        'is_correct',
    ];
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}

