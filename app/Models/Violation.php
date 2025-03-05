<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Violation extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'violation_type_id',
        'date',
        'description',
        'sanction_type_id',
        'image',
        'user_id',

    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function reporter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function violationType()
    {
        return $this->belongsTo(ViolationType::class, 'violation_type_id');
    }
    public function sanctionType()
    {
        return $this->belongsTo(SanctionType::class, 'sanction_type_id');
    }
}

