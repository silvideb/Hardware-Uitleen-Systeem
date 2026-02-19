<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardware_item extends Model
{
    /** @use HasFactory<\Database\Factories\HardwareItemsFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'description',
        'status',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function getPriceInEuroAttribute()
    {
    return number_format($this->price / 100, 2, ',', '.');
    }   

}
