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
        'hardware_item_id',
        'start_date',
        'due_date',
        'status',
        
    ];

}
