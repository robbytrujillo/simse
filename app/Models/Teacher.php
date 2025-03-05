<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'birth_place',
        'birth_date',
        'gender',
        'address',
        'phone',
        'email',
        'last_education',
        'education_institution',
        'graduation_year',
        'employee_id',
        'employment_status',
        'position',
        'start_date',
        'user_id',
        'image',
    ];
    public function classrooms()
    {
        return $this->hasMany(ClassRoom::class);
    }
    public function teachingData()
    {
        return $this->hasMany(TeachingData::class, 'teacher_id');
    }
    public function exams()
    {
        return $this->hasMany(Exam::class, 'teacher_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

