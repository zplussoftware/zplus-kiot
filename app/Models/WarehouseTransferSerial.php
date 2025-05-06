<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarehouseTransferSerial extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'transfer_item_id',
        'serial_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get the transfer item that this serial belongs to.
     */
    public function transferItem()
    {
        return $this->belongsTo(WarehouseTransferItem::class, 'transfer_item_id');
    }

    /**
     * Get the product serial being transferred.
     */
    public function serial()
    {
        return $this->belongsTo(ProductSerial::class, 'serial_id');
    }
}
