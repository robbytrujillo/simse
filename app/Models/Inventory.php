<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Inventory extends Model
{
    protected $fillable = [
        'item_code',
        'item_name',
        'category_id',
        'vendor_id',
        'description',
        'class_id',
        'quantity',
        'condition',
        'procurement_date',
        'remarks',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}

