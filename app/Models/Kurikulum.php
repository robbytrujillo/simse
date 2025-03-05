<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'academic_year', 'description'];

    public function syllabuses() {
        return $this->hasMany(Silabus::class);
    }
}
