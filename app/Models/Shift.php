<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'warehouse_id',
        'start_time',
        'end_time',
        'opening_amount',
        'closing_amount',
        'total_cash_sale',
        'total_bank_sale',
        'total_credit_sale',
        'total_sale',
        'status',
        'note',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'opening_amount' => 'decimal:2',
        'closing_amount' => 'decimal:2',
        'total_cash_sale' => 'decimal:2',
        'total_bank_sale' => 'decimal:2',
        'total_credit_sale' => 'decimal:2',
        'total_sale' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get the user who owns the shift.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the warehouse where this shift is taking place.
     */
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    /**
     * Get the orders made during this shift.
     */
    public function shiftOrders()
    {
        return $this->hasMany(ShiftOrder::class);
    }

    /**
     * Get the orders made during this shift.
     */
    public function orders()
    {
        return $this->hasManyThrough(Order::class, ShiftOrder::class, 'shift_id', 'id', 'id', 'order_id');
    }
}
