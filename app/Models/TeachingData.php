<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingData extends Model
{
    use HasFactory;

    protected $table = 'teaching_data';

    protected $fillable = [
        'teacher_id',
        'class_id',
        'mapel_id',
        'hours_per_week',
        'day',
        'start_time',
        'end_time',
    ];
    protected $casts = [
        'day' => 'array',
        'start_time' => 'array',
        'end_time' => 'array',
    ];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
}

