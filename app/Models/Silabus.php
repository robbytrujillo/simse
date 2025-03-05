<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Silabus extends Model
{
    use HasFactory;

    protected $fillable = ['curriculum_id', 'class_id', 'content', 'mapel_id'];

    public function curriculum()
    {
        return $this->belongsTo(Kurikulum::class, 'curriculum_id');
    }
    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}

