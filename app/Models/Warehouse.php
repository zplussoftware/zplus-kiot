<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'location',
        'description',
        'status',
    ];

    /**
     * Get the users that have access to this warehouse.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_warehouse')
                    ->withTimestamps();
    }

    /**
     * Get the product stocks in this warehouse.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productStocks()
    {
        return $this->hasMany(ProductStock::class);
    }

    /**
     * Get the product serials in this warehouse.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productSerials()
    {
        return $this->hasMany(ProductSerial::class);
    }

    /**
     * Get the outgoing warehouse transfers from this warehouse.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function outgoingTransfers()
    {
        return $this->hasMany(WarehouseTransfer::class, 'from_warehouse_id');
    }

    /**
     * Get the incoming warehouse transfers to this warehouse.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incomingTransfers()
    {
        return $this->hasMany(WarehouseTransfer::class, 'to_warehouse_id');
    }

    /**
     * Get the stock imports for this warehouse.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stockImports()
    {
        return $this->hasMany(StockImport::class);
    }

    /**
     * Get the orders fulfilled from this warehouse.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}