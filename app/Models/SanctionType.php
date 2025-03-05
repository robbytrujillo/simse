<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanctionType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function violations() {
        return $this->hasMany(Violation::class, 'sanction_type_id');
    }
}
