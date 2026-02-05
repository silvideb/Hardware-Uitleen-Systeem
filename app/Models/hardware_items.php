<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardware_items extends Model
{
    /** @use HasFactory<\Database\Factories\HardwareItemsFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'description',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function loans()
    {
        return $this->belongsToMany(loans::class, 'loan_hardware_item', 'hardware_item_id', 'loan_id');
    }
}
