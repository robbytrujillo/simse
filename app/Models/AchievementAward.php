<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchievementAward extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function achievements() {
        return $this->hasMany(Achievement::class, 'achievement_reward_id');
    }
}
