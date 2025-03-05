<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'student_id',
        'score',
    ];

    public function exam() {
        return $this->belongsTo(Exam::class, 'exam_id');
    }
    public function student() {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function siswa() {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
