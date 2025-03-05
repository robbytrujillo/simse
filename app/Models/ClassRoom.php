<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'teacher_id',
    ];
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function silabus()
    {
        return $this->hasMany(Silabus::class, 'class_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'class_id');
    }
    public function teachingData()
    {
        return $this->hasMany(TeachingData::class, 'class_id');
    }
    public function exams()
    {
        return $this->hasMany(Exam::class, 'class_id');
    }
}

