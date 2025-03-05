<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'duration',
        'is_active',
        'class_id',
        'teacher_id',
        'mapel_id',
    ];

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
    public function questions()
    {
        return $this->hasMany(Question::class, 'exam_id');
    }
    public function studentAnswers()
    {
        return $this->hasMany(StudentAnswer::class, 'exam_id');
    }
}

