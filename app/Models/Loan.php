<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Loan extends Model
{
    /** @use HasFactory<\Database\Factories\LoansFactory> */
    use HasFactory;
    public const STATUS_PENDING = 'pending';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_OVERDUE = 'overdue';
    public const STATUS_RETURNED = 'returned';
    public const STATUS_CANCELLED = 'cancelled';
    public const STATUS_REJECTED = 'rejected';


    protected $fillable = [
        'user_id',
        'hardware_item_id',
        'start_date',
        'due_date',
        'status',
        'reject_reason',
    ];

   protected function casts()
   {
        return [
            'start_date' => 'datetime',
            'due_date' => 'datetime',
        ];
   }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hardwareItem()
    {
        return $this->belongsTo(Hardware_item::class);
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            self::STATUS_PENDING => 'Pending',
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_OVERDUE => 'Overdue',
            self::STATUS_RETURNED => 'Returned',
            self::STATUS_CANCELLED => 'Cancelled',
            self::STATUS_REJECTED => 'Rejected',
            default => 'Unknown',
        };
    }

    public function getStatusBadgeClassAttribute()
    {
    return match($this->status) {
        self::STATUS_PENDING => 'bg-yellow-100 text-yellow-800',
        self::STATUS_ACTIVE => 'bg-blue-100 text-blue-800',
        self::STATUS_OVERDUE => 'bg-orange-100 text-orange-800',
        self::STATUS_RETURNED => 'bg-green-100 text-green-800',
        self::STATUS_CANCELLED => 'bg-gray-100 text-gray-800',
        self::STATUS_REJECTED => 'bg-red-100 text-red-800',
        default => 'bg-gray-200 text-gray-900',
    };
    }

    public function getStatusIconAttribute()
    {
    return match($this->status) {
        self::STATUS_OVERDUE => '⚠️',
        self::STATUS_RETURNED => '✅',
        self::STATUS_ACTIVE => '📘',
        self::STATUS_PENDING => '⏳',
        self::STATUS_CANCELLED => '❌',
        self::STATUS_REJECTED => '❌',
        default => 'ℹ️',
        };
    }

   
}
