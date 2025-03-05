<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'name',
        'gender',
        'dob',
        'address',
        'phone',
        'class_id',
        'father_name',
        'slug',
        'image',
        'email',
        'user_id',
    ];

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
