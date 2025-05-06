<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_number',
        'customer_id',
        'warehouse_id',
        'user_id',
        'subtotal',
        'discount',
        'total',
        'paid_amount',
        'debt_amount',
        'status',
        'note',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'subtotal' => 'decimal:2',
        'discount' => 'decimal:2',
        'total' => 'decimal:2',
        'paid_amount' => 'decimal:2',
        'debt_amount' => 'decimal:2',
    ];

    /**
     * Get the customer that owns this order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the warehouse where this order was placed.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    /**
     * Get the user who created this order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order items for this order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the payments for this order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany(OrderPayment::class);
    }

    /**
     * Get the status history for this order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statusHistory()
    {
        return $this->hasMany(OrderStatusHistory::class);
    }

    /**
     * Get the warranties for this order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function warranties()
    {
        return $this->hasMany(Warranty::class);
    }

    /**
     * Get the shift that this order belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function shifts()
    {
        return $this->belongsToMany(Shift::class, 'shift_orders')
                    ->withTimestamps();
    }
}
