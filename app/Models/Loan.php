<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
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
        return $this->belongsToMany(Hardware_item::class, 'loan_hardware_item', 'loan_id', 'hardware_item_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
