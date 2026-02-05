<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    /** @use HasFactory<\Database\Factories\LoansFactory> */
    use HasFactory;


    protected $fillable = [
        'user_id',
        'start_date',
        'due_date',
    ];

    public function hardware_items()
    {
        return $this->belongsToMany(Hardware_items::class, 'loan_hardware_item', 'loan_id', 'hardware_item_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
