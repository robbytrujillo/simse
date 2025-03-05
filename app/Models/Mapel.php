<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mapel extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_mapel',
    ];
    public function teachingData()
    {
        return $this->hasMany(TeachingData::class, 'mapel_id');
    }
    public function silabus()
    {
        return $this->hasMany(Silabus::class, 'mapel_id');
    }
    public function exams()
    {
        return $this->hasMany(Exam::class, 'mapel_id');
    }
}

