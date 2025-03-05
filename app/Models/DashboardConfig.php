<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'text_header',
        'gambar_header',
        'gambar_favicon',
        'text_footer',
    ];
}
