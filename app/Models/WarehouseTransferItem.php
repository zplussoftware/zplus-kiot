<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarehouseTransferItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'transfer_id',
        'product_id',
        'quantity',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'quantity' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get the warehouse transfer that this item belongs to.
     */
    public function warehouseTransfer()
    {
        return $this->belongsTo(WarehouseTransfer::class, 'transfer_id');
    }

    /**
     * Get the product being transferred.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the serials being transferred with this item.
     */
    public function serials()
    {
        return $this->hasMany(WarehouseTransferSerial::class, 'transfer_item_id');
    }
}
