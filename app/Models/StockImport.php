<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockImport extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'import_number',
        'supplier_id',
        'warehouse_id',
        'user_id',
        'total',
        'paid_amount',
        'debt_amount',
        'status',
        'note',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'total' => 'decimal:2',
        'paid_amount' => 'decimal:2',
        'debt_amount' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get the supplier for this stock import.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Get the warehouse where the stock is being imported.
     */
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    /**
     * Get the user who created the import.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the items in this stock import.
     */
    public function items()
    {
        return $this->hasMany(StockImportItem::class, 'import_id');
    }

    /**
     * Get the supplier debt record for this import.
     */
    public function supplierDebt()
    {
        return $this->hasOne(SupplierDebt::class, 'import_id');
    }
}
