<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchievementType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function achievements() {
        return $this->hasMany(Achievement::class, 'achievement_type_id');
    }
}
