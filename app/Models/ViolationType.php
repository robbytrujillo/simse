<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function violations() {
        return $this->hasMany(Violation::class, 'violation_type_id');
    }
}
