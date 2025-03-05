<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'achievement_type_id',
        'date',
        'description',
        'achievement_reward_id',
        'user_id',
        'image'
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function reporter() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function achievmentType() {
        return $this->belongsTo(AchievementType::class, 'achievement_type_id');
    }
    
    public function achievmentReward() {
        return $this->belongsTo(AchievementAward::class, 'achievement_reward_id');
    }
}
